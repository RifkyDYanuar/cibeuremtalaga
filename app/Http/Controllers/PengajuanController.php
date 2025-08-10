<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use App\Models\User;

class PengajuanController extends Controller
{
    /**
     * Display a listing of pengajuan for admin
     */
    public function index(Request $request)
    {
        $query = Pengajuan::with(['user', 'jenisSurat']);
        
        // Filter by status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Filter by jenis surat
        if ($request->has('jenis_surat_id') && $request->jenis_surat_id != '') {
            $query->where('jenis_surat_id', $request->jenis_surat_id);
        }
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            })->orWhereHas('jenisSurat', function($q) use ($search) {
                $q->where('nama', 'LIKE', "%{$search}%");
            });
        }
        
        $pengajuans = $query->latest()->paginate(15);
        $jenisSurats = JenisSurat::all();
        
        return view('admin.pengajuan.index', compact('pengajuans', 'jenisSurats'));
    }

    /**
     * Show the form for creating a new pengajuan (user)
     */
    public function create()
    {
        $jenisSurats = JenisSurat::where('is_active', true)->get();
        return view('user.pengajuan.create', compact('jenisSurats'));
    }

    /**
     * Store a newly created pengajuan (user)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nik' => 'required|string|size:16|unique:pengajuans,data->nik',
            'no_kk' => 'required|string|size:16',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'no_hp' => 'required|string|min:10|max:15',
            'tujuan_permohonan' => 'required|string',
            'jenis_surat_id' => 'required|exists:jenis_surats,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nik.unique' => 'NIK sudah terdaftar dalam pengajuan lain.',
            'nik.size' => 'NIK harus 16 digit.',
            'no_kk.size' => 'No KK harus 16 digit.',
            'lampiran.max' => 'Ukuran file maksimal 2MB.',
            'lampiran.mimes' => 'File harus berformat PDF, JPG, JPEG, atau PNG.',
        ]);

        // Prepare data
        $dataUtama = [
            'nama_lengkap' => $request->nama_lengkap,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'status_perkawinan' => $request->status_perkawinan,
            'no_hp' => $request->no_hp,
            'tujuan_permohonan' => $request->tujuan_permohonan,
        ];

        // Handle file upload
        $lampiranPath = null;
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();
            $lampiranPath = $file->storeAs('lampiran', $filename, 'public');
            $dataUtama['lampiran'] = $lampiranPath;
        }

        // Create pengajuan
        $pengajuan = Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat_id' => $request->jenis_surat_id,
            'data' => json_encode($dataUtama),
            'status' => 'Pending',
        ]);

        // Send notification to admin
        // $admins = User::where('role', 'admin')->get();
        // foreach ($admins as $admin) {
        //     $admin->notify(new PengajuanSubmitted($pengajuan));
        // }

        return redirect()->route('user.riwayat')
                        ->with('success', 'Pengajuan berhasil dikirim dan sedang dalam proses review.');
    }

    /**
     * Display the specified pengajuan
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::with(['user', 'jenisSurat'])->findOrFail($id);
        
        // Check authorization
        if (Auth::user()->role !== 'admin' && $pengajuan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk melihat pengajuan ini.');
        }

        return view('pengajuan.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified pengajuan (admin only)
     */
    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $pengajuan = Pengajuan::with(['user', 'jenisSurat'])->findOrFail($id);
        $jenisSurats = JenisSurat::all();
        
        return view('admin.pengajuan.edit', compact('pengajuan', 'jenisSurats'));
    }

    /**
     * Update the specified pengajuan (admin only)
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $pengajuan = Pengajuan::findOrFail($id);
        $oldStatus = $pengajuan->status;

        $request->validate([
            'status' => 'required|in:Pending,Diproses,Disetujui,Ditolak',
            'catatan_admin' => 'nullable|string|max:1000',
            'file_surat' => 'nullable|file|mimes:pdf|max:5120', // 5MB max for PDF
        ], [
            'file_surat.max' => 'Ukuran file maksimal 5MB.',
            'file_surat.mimes' => 'File harus berformat PDF.',
        ]);

        // Handle file upload for finished letter
        if ($request->hasFile('file_surat')) {
            // Delete old file if exists
            if ($pengajuan->file_url) {
                Storage::disk('public')->delete($pengajuan->file_url);
            }
            
            $file = $request->file('file_surat');
            $filename = 'surat_' . $pengajuan->id . '_' . time() . '.pdf';
            $filePath = $file->storeAs('surat_jadi', $filename, 'public');
            $pengajuan->file_url = $filePath;
        }

        // Update pengajuan
        $pengajuan->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
            'file_url' => $pengajuan->file_url,
        ]);

        // Send notification if status changed
        // if ($oldStatus !== $request->status) {
        //     $pengajuan->user->notify(new PengajuanStatusUpdated($pengajuan));
        // }

        return redirect()->route('admin.pengajuan.list')
                        ->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /**
     * Remove the specified pengajuan (admin only)
     */
    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $pengajuan = Pengajuan::findOrFail($id);
        
        // Delete associated files
        if ($pengajuan->file_url) {
            Storage::disk('public')->delete($pengajuan->file_url);
        }
        
        $data = json_decode($pengajuan->data, true);
        if (isset($data['lampiran'])) {
            Storage::disk('public')->delete($data['lampiran']);
        }

        $pengajuan->delete();

        return redirect()->route('admin.pengajuan.list')
                        ->with('success', 'Pengajuan berhasil dihapus.');
    }

    /**
     * User pengajuan list
     */
    public function userIndex()
    {
        $pengajuans = Pengajuan::where('user_id', Auth::id())
                              ->with('jenisSurat')
                              ->latest()
                              ->paginate(10);
        
        return view('user.pengajuan_riwayat', compact('pengajuans'));
    }

    /**
     * Download letter file
     */
    public function downloadFile($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        
        // Check authorization
        if (Auth::user()->role !== 'admin' && $pengajuan->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk mengunduh file ini.');
        }

        if (!$pengajuan->file_url || !Storage::disk('public')->exists($pengajuan->file_url)) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->download(storage_path('app/public/' . $pengajuan->file_url));
    }

    /**
     * Bulk update status (admin only)
     */
    public function bulkUpdate(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $request->validate([
            'pengajuan_ids' => 'required|array',
            'pengajuan_ids.*' => 'exists:pengajuans,id',
            'status' => 'required|in:Pending,Diproses,Disetujui,Ditolak',
            'catatan_admin' => 'nullable|string|max:1000',
        ]);

        $pengajuans = Pengajuan::whereIn('id', $request->pengajuan_ids)->get();
        
        foreach ($pengajuans as $pengajuan) {
            $oldStatus = $pengajuan->status;
            
            $pengajuan->update([
                'status' => $request->status,
                'catatan_admin' => $request->catatan_admin,
            ]);

            // Send notification if status changed
            // if ($oldStatus !== $request->status) {
            //     $pengajuan->user->notify(new PengajuanStatusUpdated($pengajuan));
            // }
        }

        return redirect()->route('admin.pengajuan.list')
                        ->with('success', count($request->pengajuan_ids) . ' pengajuan berhasil diperbarui.');
    }

    /**
     * Get pengajuan statistics for dashboard
     */
    public function getStats()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        $stats = [
            'total' => Pengajuan::count(),
            'pending' => Pengajuan::where('status', 'Pending')->count(),
            'diproses' => Pengajuan::where('status', 'Diproses')->count(),
            'disetujui' => Pengajuan::where('status', 'Disetujui')->count(),
            'ditolak' => Pengajuan::where('status', 'Ditolak')->count(),
            'bulan_ini' => Pengajuan::whereMonth('created_at', now()->month)
                                   ->whereYear('created_at', now()->year)
                                   ->count(),
        ];

        return response()->json($stats);
    }

    /**
     * Export pengajuan data
     */
    public function export(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        // This method can be extended to handle Excel/PDF export
        // For now, returning JSON format
        $query = Pengajuan::with(['user', 'jenisSurat']);
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        if ($request->has('date_from') && $request->date_from != '') {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->has('date_to') && $request->date_to != '') {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $pengajuans = $query->get();

        return response()->json($pengajuans);
    }
}