<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        $status = $request->input('status', '');
        $jenisSurat = $request->input('jenis_surat', '');
        
        // Query dasar
        $query = Pengajuan::with(['user', 'jenisSurat'])
                          ->whereBetween('created_at', [$startDate, $endDate]);
        
        // Filter berdasarkan status
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }
        
        // Filter berdasarkan jenis surat
        if ($jenisSurat && $jenisSurat !== 'all') {
            $query->where('jenis_surat_id', $jenisSurat);
        }
        
        $pengajuans = $query->orderBy('created_at', 'desc')->get();
        
        // Statistik
        $totalPengajuan = $pengajuans->count();
        $pengajuanPending = $pengajuans->where('status', 'Pending')->count();
        $pengajuanDisetujui = $pengajuans->where('status', 'Disetujui')->count();
        $pengajuanDitolak = $pengajuans->where('status', 'Ditolak')->count();
        
        // Statistik per jenis surat
        $statistikJenisSurat = $pengajuans->groupBy('jenis_surat_id')->map(function ($items) {
            return [
                'jenis_surat' => $items->first()->jenisSurat->nama ?? 'Tidak diketahui',
                'total' => $items->count(),
                'pending' => $items->where('status', 'Pending')->count(),
                'disetujui' => $items->where('status', 'Disetujui')->count(),
                'ditolak' => $items->where('status', 'Ditolak')->count(),
            ];
        });
        
        // Statistik per hari
        $statistikHarian = $pengajuans->groupBy(function ($item) {
            return $item->created_at ? $item->created_at->format('Y-m-d') : date('Y-m-d');
        })->map(function ($items, $date) {
            return [
                'tanggal' => Carbon::parse($date)->format('d M Y'),
                'total' => $items->count(),
                'pending' => $items->where('status', 'Pending')->count(),
                'disetujui' => $items->where('status', 'Disetujui')->count(),
                'ditolak' => $items->where('status', 'Ditolak')->count(),
            ];
        });
        
        // Data untuk dropdown
        $jenisSurats = JenisSurat::all();
        
        return view('admin.laporan', compact(
            'pengajuans',
            'totalPengajuan',
            'pengajuanPending',
            'pengajuanDisetujui',
            'pengajuanDitolak',
            'statistikJenisSurat',
            'statistikHarian',
            'jenisSurats',
            'startDate',
            'endDate',
            'status',
            'jenisSurat'
        ));
    }
    
    public function exportPDF(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        $status = $request->input('status', '');
        $jenisSurat = $request->input('jenis_surat', '');
        
        // Query yang sama dengan index
        $query = Pengajuan::with(['user', 'jenisSurat'])
                          ->whereBetween('created_at', [$startDate, $endDate]);
        
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }
        
        if ($jenisSurat && $jenisSurat !== 'all') {
            $query->where('jenis_surat_id', $jenisSurat);
        }
        
        $pengajuans = $query->orderBy('created_at', 'desc')->get();
        
        // Statistik
        $totalPengajuan = $pengajuans->count();
        $pengajuanPending = $pengajuans->where('status', 'Pending')->count();
        $pengajuanDisetujui = $pengajuans->where('status', 'Disetujui')->count();
        $pengajuanDitolak = $pengajuans->where('status', 'Ditolak')->count();
        
        $data = [
            'pengajuans' => $pengajuans,
            'totalPengajuan' => $totalPengajuan,
            'pengajuanPending' => $pengajuanPending,
            'pengajuanDisetujui' => $pengajuanDisetujui,
            'pengajuanDitolak' => $pengajuanDitolak,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'status' => $status,
            'jenisSurat' => $jenisSurat,
        ];
        
        $pdf = Pdf::loadView('admin.laporan_pdf', $data);
        return $pdf->download('laporan_pengajuan_' . date('Y-m-d') . '.pdf');
    }
    
    public function exportExcel(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
        $status = $request->input('status', '');
        $jenisSurat = $request->input('jenis_surat', '');
        
        // Query yang sama dengan index
        $query = Pengajuan::with(['user', 'jenisSurat'])
                          ->whereBetween('created_at', [$startDate, $endDate]);
        
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }
        
        if ($jenisSurat && $jenisSurat !== 'all') {
            $query->where('jenis_surat_id', $jenisSurat);
        }
        
        $pengajuans = $query->orderBy('created_at', 'desc')->get();
        
        // Create CSV content
        $filename = 'laporan_pengajuan_' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        
        $callback = function() use ($pengajuans) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, [
                'ID',
                'Nama Pemohon',
                'Email',
                'Jenis Surat',
                'Status',
                'Tanggal Pengajuan',
                'Tanggal Update',
                'Catatan Admin'
            ]);
            
            // Data
            foreach ($pengajuans as $pengajuan) {
                fputcsv($file, [
                    $pengajuan->id,
                    $pengajuan->user->name ?? 'Tidak diketahui',
                    $pengajuan->user->email ?? 'Tidak diketahui',
                    $pengajuan->jenisSurat->nama ?? 'Tidak diketahui',
                    $pengajuan->status,
                    $pengajuan->created_at ? $pengajuan->created_at->format('d/m/Y H:i') : '-',
                    $pengajuan->updated_at ? $pengajuan->updated_at->format('d/m/Y H:i') : '-',
                    $pengajuan->catatan_admin ?? ''
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
