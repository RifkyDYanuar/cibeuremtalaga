<?php

namespace App\Http\Controllers;

use App\Models\Apbdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ApbdesController extends Controller
{
    public function __construct()
    {
        // Middleware untuk public route dikecualikan di routes
        // Admin middleware sudah diterapkan di route group
    }

    // Halaman public untuk masyarakat
    public function publicIndex(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        
        // Get available years - include all statuses first, then filter
        $tahunList = Apbdes::select('tahun_anggaran')
            ->distinct()
            ->orderBy('tahun_anggaran', 'desc')
            ->pluck('tahun_anggaran');

        // If no data exists at all, use current year
        if ($tahunList->isEmpty()) {
            $tahunList = collect([date('Y')]);
            $tahun = date('Y');
        } else {
            // If requested year doesn't exist, use the latest available year
            if (!$tahunList->contains($tahun)) {
                $tahun = $tahunList->first();
            }
        }

        // Data APBDES untuk tahun yang dipilih - only active status for public
        $pendapatan = Apbdes::where('jenis', 'pendapatan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        $belanja = Apbdes::where('jenis', 'belanja')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        $pembiayaan = Apbdes::where('jenis', 'pembiayaan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        // Ringkasan keuangan - hanya data aktif untuk public
        $totalPendapatan = Apbdes::where('jenis', 'pendapatan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->sum('jumlah');
            
        $totalBelanja = Apbdes::where('jenis', 'belanja')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->sum('jumlah');

        $totalPembiayaan = Apbdes::where('jenis', 'pembiayaan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->sum('jumlah');
            
        // Total Belanja termasuk Pembiayaan
        $totalBelanjaKeseluruhan = $totalBelanja + $totalPembiayaan;
        
        // Saldo = Pendapatan - (Belanja + Pembiayaan)
        $saldo = $totalPendapatan - $totalBelanjaKeseluruhan;

        // Debug logging
        Log::info('Public APBDES Data', [
            'tahun' => $tahun,
            'total_pendapatan' => $totalPendapatan,
            'total_belanja' => $totalBelanja,
            'total_pembiayaan' => $totalPembiayaan,
            'pendapatan_count' => $pendapatan->flatten()->count(),
            'belanja_count' => $belanja->flatten()->count(),
            'pembiayaan_count' => $pembiayaan->flatten()->count()
        ]);

        return view('public.apbdes', compact(
            'pendapatan', 
            'belanja', 
            'pembiayaan',
            'tahun', 
            'tahunList',
            'totalPendapatan',
            'totalBelanja',
            'totalPembiayaan',
            'totalBelanjaKeseluruhan',
            'saldo'
        ));
    }

    // Export PDF APBDES
    public function exportPdf(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        
        // Get available years
        $tahunList = Apbdes::select('tahun_anggaran')
            ->distinct()
            ->orderBy('tahun_anggaran', 'desc')
            ->pluck('tahun_anggaran');

        if ($tahunList->isEmpty()) {
            $tahunList = collect([date('Y')]);
            $tahun = date('Y');
        } else {
            if (!$tahunList->contains($tahun)) {
                $tahun = $tahunList->first();
            }
        }

        // Data APBDES untuk tahun yang dipilih - only active status
        $pendapatan = Apbdes::where('jenis', 'pendapatan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        $belanja = Apbdes::where('jenis', 'belanja')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        $pembiayaan = Apbdes::where('jenis', 'pembiayaan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        // Ringkasan keuangan
        $totalPendapatan = Apbdes::where('jenis', 'pendapatan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->sum('jumlah');
            
        $totalBelanja = Apbdes::where('jenis', 'belanja')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->sum('jumlah');

        $totalPembiayaan = Apbdes::where('jenis', 'pembiayaan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->sum('jumlah');
            
        // Total Belanja termasuk Pembiayaan
        $totalBelanjaKeseluruhan = $totalBelanja + $totalPembiayaan;
        
        // Saldo = Pendapatan - (Belanja + Pembiayaan)
        $saldo = $totalPendapatan - $totalBelanjaKeseluruhan;

        $data = compact(
            'pendapatan', 
            'belanja', 
            'pembiayaan',
            'tahun',
            'totalPendapatan',
            'totalBelanja',
            'totalPembiayaan',
            'totalBelanjaKeseluruhan',
            'saldo'
        );

        $pdf = Pdf::loadView('exports.apbdes-pdf', $data);
        $pdf->setPaper('a4', 'portrait');
        
        return $pdf->download('APBDES-Desa-Cibeureum-' . $tahun . '.pdf');
    }

    // Halaman admin untuk mengelola APBDES
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));
        $jenis = $request->get('jenis', 'all');
        $status = $request->get('status', 'all');

        // Start with fresh query
        $query = Apbdes::query()->with(['creator', 'updater']);

        if ($tahun != 'all') {
            $query->where('tahun_anggaran', $tahun);
        }

        if ($jenis != 'all') {
            $query->where('jenis', $jenis);
        }

        if ($status != 'all') {
            $query->where('status', $status);
        }

        $apbdes = $query->orderBy('created_at', 'desc')
            ->orderBy('tahun_anggaran', 'desc')
            ->orderBy('jenis')
            ->orderBy('kategori')
            ->paginate(20);

        // Data untuk filter - fresh query
        $tahunList = Apbdes::select('tahun_anggaran')
            ->distinct()
            ->orderBy('tahun_anggaran', 'desc')
            ->pluck('tahun_anggaran');

        // Statistik - fresh calculations
        $statsQuery = Apbdes::query();
        if ($tahun != 'all') {
            $statsQuery->where('tahun_anggaran', $tahun);
        }

        $stats = [
            'total_pendapatan' => (clone $statsQuery)->where('jenis', 'pendapatan')->sum('jumlah'),
            'total_belanja' => (clone $statsQuery)->where('jenis', 'belanja')->sum('jumlah'),
            'total_pembiayaan' => (clone $statsQuery)->where('jenis', 'pembiayaan')->sum('jumlah'),
            'total_item' => (clone $statsQuery)->count(),
            'draft_count' => Apbdes::where('status', 'draft')->count()
        ];

        // Total belanja keseluruhan (belanja + pembiayaan)
        $stats['total_belanja_keseluruhan'] = $stats['total_belanja'] + $stats['total_pembiayaan'];

        return view('admin.apbdes.index', compact('apbdes', 'tahunList', 'tahun', 'jenis', 'status', 'stats'));
    }

    public function create()
    {
        $kategoriPendapatan = Apbdes::getKategoriPendapatan();
        $kategoriBelanja = Apbdes::getKategoriBelanja();
        $kategoriPembiayaan = Apbdes::getKategoriPembiayaan();
        
        return view('admin.apbdes.create', compact('kategoriPendapatan', 'kategoriBelanja', 'kategoriPembiayaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'jenis' => 'required|in:pendapatan,belanja,pembiayaan',
            'kategori' => 'required|string|max:255',
            'uraian' => 'required|string',
            'jumlah' => 'required|numeric|min:0|max:9999999999999',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:draft,aktif,revisi'
        ], [
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0.',
            'jumlah.max' => 'Jumlah terlalu besar.',
            'tahun_anggaran.required' => 'Tahun anggaran wajib diisi.',
            'jenis.required' => 'Jenis wajib dipilih.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'uraian.required' => 'Uraian wajib diisi.',
            'status.required' => 'Status wajib dipilih.'
        ]);

        // Clean the jumlah field to ensure it's numeric
        $data = $request->all();
        $data['jumlah'] = (float) preg_replace('/[^\d.]/', '', $data['jumlah']);
        $data['created_by'] = Auth::id();

        $apbdes = Apbdes::create($data);

        // Clear any potential cache
        cache()->forget('apbdes_stats');
        
        // Debug log
        Log::info('APBDES created', ['id' => $apbdes->id, 'data' => $data]);

        return redirect()->route('admin.apbdes.index', [
                'tahun' => $data['tahun_anggaran'],
                'jenis' => $data['jenis'],
                'status' => $data['status']
            ])
            ->with('success', 'Data APBDES berhasil ditambahkan.');
    }

    public function show(Apbdes $apbdes)
    {
        $apbdes->load(['creator', 'updater']);
        return view('admin.apbdes.show', compact('apbdes'));
    }

    public function edit(Apbdes $apbdes)
    {
        $kategoriPendapatan = Apbdes::getKategoriPendapatan();
        $kategoriBelanja = Apbdes::getKategoriBelanja();
        $kategoriPembiayaan = Apbdes::getKategoriPembiayaan();
        
        return view('admin.apbdes.edit', compact('apbdes', 'kategoriPendapatan', 'kategoriBelanja', 'kategoriPembiayaan'));
    }

    public function update(Request $request, Apbdes $apbdes)
    {
        $request->validate([
            'tahun_anggaran' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'jenis' => 'required|in:pendapatan,belanja,pembiayaan',
            'kategori' => 'required|string|max:255',
            'uraian' => 'required|string',
            'jumlah' => 'required|numeric|min:0|max:9999999999999',
            'keterangan' => 'nullable|string',
            'status' => 'required|in:draft,aktif,revisi'
        ], [
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah tidak boleh kurang dari 0.',
            'jumlah.max' => 'Jumlah terlalu besar.',
            'tahun_anggaran.required' => 'Tahun anggaran wajib diisi.',
            'jenis.required' => 'Jenis wajib dipilih.',
            'kategori.required' => 'Kategori wajib dipilih.',
            'uraian.required' => 'Uraian wajib diisi.',
            'status.required' => 'Status wajib dipilih.'
        ]);

        // Clean the jumlah field to ensure it's numeric
        $data = $request->all();
        $data['jumlah'] = (float) preg_replace('/[^\d.]/', '', $data['jumlah']);
        $data['updated_by'] = Auth::id();

        $apbdes->update($data);

        // Clear any potential cache
        cache()->forget('apbdes_stats');
        
        // Debug log
        Log::info('APBDES updated', ['id' => $apbdes->id, 'data' => $data]);

        return redirect()->route('admin.apbdes.index', [
                'tahun' => $data['tahun_anggaran'],
                'jenis' => $data['jenis'],
                'status' => $data['status']
            ])
            ->with('success', 'Data APBDES berhasil diperbarui.');
    }

    public function destroy(Apbdes $apbdes)
    {
        $apbdes->delete();

        return redirect()->route('admin.apbdes.index')
            ->with('success', 'Data APBDES berhasil dihapus.');
    }

    // API untuk mendapatkan data statistik
    public function getStats(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $pendapatanPerKategori = Apbdes::select('kategori', DB::raw('SUM(jumlah) as total'))
            ->where('jenis', 'pendapatan')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->groupBy('kategori')
            ->get();

        $belanjaPerKategori = Apbdes::select('kategori', DB::raw('SUM(jumlah) as total'))
            ->where('jenis', 'belanja')
            ->where('tahun_anggaran', $tahun)
            ->where('status', 'aktif')
            ->groupBy('kategori')
            ->get();

        return response()->json([
            'pendapatan' => $pendapatanPerKategori,
            'belanja' => $belanjaPerKategori,
            'total_pendapatan' => Apbdes::getTotalPendapatan($tahun),
            'total_belanja' => Apbdes::getTotalBelanja($tahun),
            'saldo' => Apbdes::getSaldo($tahun)
        ]);
    }

    // Bulk actions
    public function bulkUpdateStatus(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'status' => 'required|in:draft,aktif,revisi'
        ]);

        Apbdes::whereIn('id', $request->ids)
            ->update([
                'status' => $request->status,
                'updated_by' => Auth::id(),
                'updated_at' => now()
            ]);

        return response()->json(['message' => 'Status berhasil diperbarui']);
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array'
        ]);

        Apbdes::whereIn('id', $request->ids)->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
