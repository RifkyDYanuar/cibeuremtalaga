<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penduduk;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PendudukExport;
use App\Exports\PendudukTemplateExport;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;

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

    // Export Methods
    public function exportExcel(Request $request)
    {
        try {
            $export = new PendudukExport($request);
            $format = $request->get('format', 'csv'); // Default to CSV
            
            if ($format === 'excel') {
                return $export->generateExcel();
            } else {
                return $export->generateCSV();
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.data-kependudukan.index')
                            ->with('error', 'Gagal mengekspor data: ' . $e->getMessage());
        }
    }

    public function exportPdf(Request $request)
    {
        try {
            // Query untuk data penduduk dengan filter yang sama
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

            $penduduk = $query->orderBy('nama')->get();

            // Statistik untuk header PDF
            $statistik = [
                'total_penduduk' => $penduduk->count(),
                'laki_laki' => $penduduk->where('jenis_kelamin', 'Laki-laki')->count(),
                'perempuan' => $penduduk->where('jenis_kelamin', 'Perempuan')->count(),
                'kepala_keluarga' => $penduduk->where('status_dalam_keluarga', 'Kepala Keluarga')->count(),
            ];

            $data = [
                'penduduk' => $penduduk,
                'statistik' => $statistik,
                'tanggal_export' => date('d F Y'),
                'filters' => [
                    'search' => $request->search,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'status' => $request->status,
                    'rt' => $request->rt
                ]
            ];

            $pdf = Pdf::loadView('admin.data-kependudukan.export-pdf', $data);
            $pdf->setPaper('A4', 'landscape');
            
            $filename = 'data-penduduk-' . date('Y-m-d-H-i-s') . '.pdf';
            return $pdf->download($filename);

        } catch (\Exception $e) {
            return redirect()->route('admin.data-kependudukan.index')
                            ->with('error', 'Gagal mengekspor data ke PDF: ' . $e->getMessage());
        }
    }

    // Import Methods
    public function importForm()
    {
        return view('admin.data-kependudukan.import');
    }

    public function downloadTemplate()
    {
        try {
            return Excel::download(new PendudukTemplateExport, 'template-data-penduduk.xlsx');
        } catch (\Exception $e) {
            return redirect()->route('admin.data-kependudukan.index')
                            ->with('error', 'Gagal mendownload template: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:10240', // Max 10MB
        ], [
            'file.required' => 'File harus dipilih',
            'file.file' => 'File tidak valid',
            'file.mimes' => 'File harus berformat Excel (.xlsx, .xls) atau CSV (.csv)',
            'file.max' => 'Ukuran file maksimal 10MB',
        ]);

        try {
            DB::beginTransaction();

            $import = new PendudukImport();
            Excel::import($import, $request->file('file'));

            $stats = $import->getStats();

            DB::commit();

            $message = "Import berhasil! ";
            $message .= "Data berhasil diimpor: {$stats['imported']}, ";
            $message .= "Data dilewati: {$stats['skipped']}";

            if (!empty($stats['errors'])) {
                $message .= ". Errors: " . implode(', ', array_slice($stats['errors'], 0, 5));
                if (count($stats['errors']) > 5) {
                    $message .= " dan " . (count($stats['errors']) - 5) . " error lainnya.";
                }
            }

            return redirect()->route('admin.data-kependudukan.index')
                            ->with('success', $message);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            DB::rollBack();
            
            $failures = $e->failures();
            $errorMessages = [];
            
            foreach ($failures as $failure) {
                $row = $failure->row();
                $attribute = $failure->attribute();
                $errors = $failure->errors();
                $values = $failure->values();
                
                $errorMessages[] = "Baris {$row}, Kolom {$attribute}: " . implode(', ', $errors);
            }
            
            $message = "Validasi gagal pada " . count($failures) . " baris. ";
            $message .= "Error pertama: " . (isset($errorMessages[0]) ? $errorMessages[0] : 'Unknown error');
            
            return redirect()->route('admin.data-kependudukan.import-form')
                            ->with('error', $message)
                            ->withInput();

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()->route('admin.data-kependudukan.import-form')
                            ->with('error', 'Gagal mengimpor data: ' . $e->getMessage())
                            ->withInput();
        }
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);

        // Convert comma-separated string to array
        $ids = explode(',', $request->ids);
        $ids = array_filter($ids); // Remove empty values

        // Validate each ID exists
        $validIds = Penduduk::whereIn('id', $ids)->pluck('id')->toArray();
        
        if (empty($validIds)) {
            return redirect()->route('admin.data-kependudukan.index')
                           ->with('error', 'Tidak ada data yang valid untuk dihapus');
        }

        try {
            $count = Penduduk::whereIn('id', $validIds)->delete();
            
            // Check if it's an AJAX request
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => "Berhasil menghapus {$count} data penduduk"
                ]);
            }
            
            // Regular form submission
            return redirect()->route('admin.data-kependudukan.index')
                           ->with('success', "Berhasil menghapus {$count} data penduduk");
                           
        } catch (\Exception $e) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus data: ' . $e->getMessage()
                ], 500);
            }
            
            return redirect()->route('admin.data-kependudukan.index')
                           ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
