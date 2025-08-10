<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengajuan;
use App\Models\JenisSurat;
use App\Models\Pengumuman;

class UserController extends Controller
{
    public function dashboard()
    {
        // Ambil 3 pengumuman terbaru yang aktif
        $announcements = Pengumuman::active()
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('user.dashboard', compact('announcements'));
    }

    public function formPengajuan()
    {
        $jenisSurats = JenisSurat::all();
        return view('user.pengajuan_form', compact('jenisSurats'));
    }

    public function storePengajuan(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'ttl' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'status_perkawinan' => 'required',
            'no_hp' => 'required',
            'tujuan_permohonan' => 'required',
            'jenis_surat_id' => 'required',
        ]);

        // Data utama
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

        // Mapping jenis surat berdasarkan nilai yang dikirim dari form
        $jenisSuratMapping = [
            'ktp_kk' => 1,      
            'domisili' => 2,    
            'sktm' => 3,        
            'skck' => 4,        
            'penelitian' => 5,  
        ];

        // Penentuan jenis_surat_id
        $jenisSuratId = $request->jenis_surat_id;
        
        if (array_key_exists($jenisSuratId, $jenisSuratMapping)) {
            $jenisSuratId = $jenisSuratMapping[$jenisSuratId];
        }
        
        if (is_numeric($jenisSuratId)) {
            $jenisSuratId = (int) $jenisSuratId;
        }

        // Validasi bahwa jenis_surat_id ada di database
        $jenisSurat = JenisSurat::find($jenisSuratId);
        if (!$jenisSurat) {
            return redirect()->back()->withErrors(['jenis_surat_id' => 'Jenis surat tidak valid.']);
        }

        // Data tambahan (khusus jenis surat)
        $dataTambahan = $request->input('data', []);
        
        // Handle file upload jika ada lampiran
        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(storage_path('app/images'), $filename);
            $dataTambahan['lampiran'] = $filename;
        }

        $dataGabungan = array_merge($dataUtama, $dataTambahan);

        Pengajuan::create([
            'user_id' => Auth::id(),
            'jenis_surat_id' => $jenisSuratId,
            'data' => json_encode($dataGabungan),
            'status' => 'Pending',
        ]);
        
        return redirect()->route('user.riwayat')->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function riwayat()
    {
        $pengajuans = Pengajuan::where('user_id', Auth::id())->latest()->get();
        return view('user.pengajuan_riwayat', compact('pengajuans'));
    }

    public function detail($id)
    {
        $pengajuan = Pengajuan::where('user_id', Auth::id())->findOrFail($id);
        return view('user.pengajuan_detail', compact('pengajuan'));
    }
}
