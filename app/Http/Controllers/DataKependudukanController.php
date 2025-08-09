<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;

class DataKependudukanController extends Controller
{
    // === ADMIN METHODS ===
    
    public function index(Request $request)
    {
        // Query untuk data penduduk dengan filter
        $query = Penduduk::query();

        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan jenis kelamin
        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan RT
        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        // Urutkan dan paginate
        $penduduk = $query->orderBy('nama')->paginate(15);

        // Statistik untuk cards
        $statistik = [
            'total_penduduk' => Penduduk::count(),
            'laki_laki' => Penduduk::where('jenis_kelamin', 'Laki-laki')->count(),
            'perempuan' => Penduduk::where('jenis_kelamin', 'Perempuan')->count(),
            'kepala_keluarga' => Penduduk::where('status_dalam_keluarga', 'Kepala Keluarga')->count(),
        ];

        // Daftar RT untuk filter
        $daftarRT = Penduduk::distinct()->pluck('rt')->sort()->values();

        return view('admin.data-kependudukan.index', compact('penduduk', 'statistik', 'daftarRT'));
    }
    
    public function publicIndex()
    {
        try {
            // Gunakan model Penduduk untuk query data
            $totalPenduduk = Penduduk::aktif()->count();
            
            if ($totalPenduduk > 0) {
                $data = [
                    'total_penduduk' => $totalPenduduk,
                    'jenis_kelamin' => [
                        'laki_laki' => Penduduk::aktif()->where('jenis_kelamin', 'Laki-laki')->count(),
                        'perempuan' => Penduduk::aktif()->where('jenis_kelamin', 'Perempuan')->count()
                    ],
                    'kepala_keluarga' => Penduduk::aktif()->where('status_dalam_keluarga', 'Kepala Keluarga')->count(),
                    'kelompok_usia' => [
                        '0-10 tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 0 AND 10')->count(),
                        '11-20 tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 11 AND 20')->count(),
                        '21-30 tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 21 AND 30')->count(),
                        '31-40 tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 31 AND 40')->count(),
                        '41-50 tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 41 AND 50')->count(),
                        '51-60 tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) BETWEEN 51 AND 60')->count(),
                        '60+ tahun' => Penduduk::aktif()->whereRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) > 60')->count()
                    ],
                    'pekerjaan' => Penduduk::aktif()->selectRaw('pekerjaan, COUNT(*) as jumlah')->groupBy('pekerjaan')->pluck('jumlah', 'pekerjaan')->toArray(),
                    'pendidikan' => Penduduk::aktif()->selectRaw('pendidikan, COUNT(*) as jumlah')->groupBy('pendidikan')->pluck('jumlah', 'pendidikan')->toArray(),
                    'agama' => Penduduk::aktif()->selectRaw('agama, COUNT(*) as jumlah')->groupBy('agama')->pluck('jumlah', 'agama')->toArray()
                ];
            } else {
                // Data kosong tapi struktur tetap sama
                $data = [
                    'total_penduduk' => 0,
                    'jenis_kelamin' => [
                        'laki_laki' => 0,
                        'perempuan' => 0
                    ],
                    'kepala_keluarga' => 0,
                    'kelompok_usia' => [
                        '0-10 tahun' => 0,
                        '11-20 tahun' => 0,
                        '21-30 tahun' => 0,
                        '31-40 tahun' => 0,
                        '41-50 tahun' => 0,
                        '51-60 tahun' => 0,
                        '60+ tahun' => 0
                    ],
                    'pekerjaan' => [],
                    'pendidikan' => [],
                    'agama' => []
                ];
            }
        } catch (\Exception $e) {
            // Fallback data
            $data = [
                'total_penduduk' => 0,
                'jenis_kelamin' => [
                    'laki_laki' => 0,
                    'perempuan' => 0
                ],
                'kepala_keluarga' => 0,
                'kelompok_usia' => [
                    '0-10 tahun' => 0,
                    '11-20 tahun' => 0,
                    '21-30 tahun' => 0,
                    '31-40 tahun' => 0,
                    '41-50 tahun' => 0,
                    '51-60 tahun' => 0,
                    '60+ tahun' => 0
                ],
                'pekerjaan' => [],
                'pendidikan' => [],
                'agama' => []
            ];
        }

        return view('public.data-kependudukan', compact('data'));
    }

    public function create()
    {
        return view('admin.data-kependudukan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:data_kependudukan',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu,Lainnya',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|in:Tidak Sekolah,SD/Sederajat,SMP/Sederajat,SMA/Sederajat,Diploma,Sarjana,Pascasarjana',
            'status_dalam_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Menantu,Cucu,Orangtua,Mertua,Famili Lain,Pembantu,Lainnya',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'no_kk' => 'nullable|string|max:16',
            'status' => 'required|in:aktif,pindah,meninggal',
            'keterangan' => 'nullable|string'
        ]);

        Penduduk::create($validated);

        return redirect()->route('admin.data-kependudukan.index')
                        ->with('success', 'Data penduduk berhasil ditambahkan');
    }

    public function show(Penduduk $penduduk)
    {
        return view('admin.data-kependudukan.show', compact('penduduk'));
    }

    public function edit(Penduduk $penduduk)
    {
        return view('admin.data-kependudukan.edit', compact('penduduk'));
    }

    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:data_kependudukan,nik,' . $penduduk->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'rt' => 'required|string|max:3',
            'rw' => 'required|string|max:3',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu,Lainnya',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pekerjaan' => 'required|string|max:255',
            'pendidikan' => 'required|in:Tidak Sekolah,SD/Sederajat,SMP/Sederajat,SMA/Sederajat,Diploma,Sarjana,Pascasarjana',
            'status_dalam_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Menantu,Cucu,Orangtua,Mertua,Famili Lain,Pembantu,Lainnya',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'kewarganegaraan' => 'required|in:WNI,WNA',
            'no_kk' => 'nullable|string|max:16',
            'status' => 'required|in:aktif,pindah,meninggal',
            'keterangan' => 'nullable|string'
        ]);

        $penduduk->update($validated);

        return redirect()->route('admin.data-kependudukan.index')
                        ->with('success', 'Data penduduk berhasil diupdate');
    }

    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect()->route('admin.data-kependudukan.index')
                        ->with('success', 'Data penduduk berhasil dihapus');
    }
}
