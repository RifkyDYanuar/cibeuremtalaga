<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use App\Models\User;
use App\Models\Agenda;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Ambil statistik real dari database
        $totalPengguna = User::count();
        $totalPengajuan = Pengajuan::count();
        $pengajuanBaru = Pengajuan::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->count();
        $pengajuanDisetujui = Pengajuan::where('status', 'Disetujui')->count();
        $pengajuanDitolak = Pengajuan::where('status', 'Ditolak')->count();
        $pengajuanPending = Pengajuan::where('status', 'Pending')->count();
        
        // Ambil pengajuan terbaru untuk tabel
        $recentPengajuans = Pengajuan::with(['user', 'jenisSurat'])
                                    ->latest()
                                    ->take(10)
                                    ->get();
        
        // Statistik perbandingan bulan sebelumnya
        $pengajuanBulanIni = Pengajuan::whereMonth('created_at', Carbon::now()->month)
                                     ->whereYear('created_at', Carbon::now()->year)
                                     ->count();
        $pengajuanBulanLalu = Pengajuan::whereMonth('created_at', Carbon::now()->subMonth()->month)
                                      ->whereYear('created_at', Carbon::now()->subMonth()->year)
                                      ->count();
        
        $persentasePerubahan = $pengajuanBulanLalu > 0 ? 
                              (($pengajuanBulanIni - $pengajuanBulanLalu) / $pengajuanBulanLalu) * 100 : 0;
        
        // Statistik pengajuan per bulan (6 bulan terakhir)
        $statistikBulanan = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $jumlah = Pengajuan::whereMonth('created_at', $bulan->month)
                              ->whereYear('created_at', $bulan->year)
                              ->count();
            $statistikBulanan[] = [
                'bulan' => $bulan->format('M Y'),
                'jumlah' => $jumlah,
                'pending' => Pengajuan::whereMonth('created_at', $bulan->month)
                                    ->whereYear('created_at', $bulan->year)
                                    ->where('status', 'Pending')
                                    ->count(),
                'disetujui' => Pengajuan::whereMonth('created_at', $bulan->month)
                                       ->whereYear('created_at', $bulan->year)
                                       ->where('status', 'Disetujui')
                                       ->count(),
                'ditolak' => Pengajuan::whereMonth('created_at', $bulan->month)
                                     ->whereYear('created_at', $bulan->year)
                                     ->where('status', 'Ditolak')
                                     ->count()
            ];
        }
        
        // Statistik jenis surat paling banyak diminta
        $jenisSuratPopuler = Pengajuan::with('jenisSurat')
                                    ->selectRaw('jenis_surat_id, COUNT(*) as total')
                                    ->groupBy('jenis_surat_id')
                                    ->orderBy('total', 'desc')
                                    ->take(5)
                                    ->get();
        
        // Variabel tambahan untuk dashboard
        $agendaAktif = Agenda::where('status', 'aktif')
                           ->where('tanggal_mulai', '>=', Carbon::now())
                           ->count();
        $monthlyLabels = $statistikBulanan ? array_column($statistikBulanan, 'bulan') : [];
        $monthlyData = $statistikBulanan ? array_column($statistikBulanan, 'jumlah') : [];
        
        return view('admin.dashboard', compact(
            'totalPengguna',
            'totalPengajuan', 
            'pengajuanBaru',
            'pengajuanDisetujui',
            'pengajuanDitolak',
            'pengajuanPending',
            'recentPengajuans',
            'persentasePerubahan',
            'statistikBulanan',
            'jenisSuratPopuler',
            'agendaAktif',
            'monthlyLabels',
            'monthlyData'
        ));
    }

    public function listPengajuan(Request $request)
    {
        $status = $request->get('status');
        $pengajuans = Pengajuan::when($status, function($q) use ($status) {
            $q->where('status', $status);
        })->latest()->get();
        return view('admin.pengajuan_list', compact('pengajuans', 'status'));
    }

    public function detailPengajuan($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('admin.pengajuan_detail', compact('pengajuan'));
    }

    public function updatePengajuan(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->catatan_admin = $request->catatan_admin;
        // Handle upload file surat jadi
        if ($request->hasFile('file_url')) {
            $file = $request->file('file_url');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('surat_jadi', $filename, 'public');
            $pengajuan->file_url = $path;
        }
        $pengajuan->save();
        return redirect()->back()->with('success', 'Pengajuan berhasil diperbarui.');
    }
}
