<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdmDesa;
use Illuminate\Http\Request;

class IdmDesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $idmData = IdmDesa::latest()->paginate(10);
        $latestIdm = IdmDesa::latest()->first();
        
        $stats = [
            'total_data' => IdmDesa::count(),
            'published' => IdmDesa::where('is_published', true)->count(),
            'unpublished' => IdmDesa::where('is_published', false)->count(),
            'latest_year' => $latestIdm ? $latestIdm->tahun : null,
            'latest_score' => $latestIdm ? $latestIdm->skor_idm : 0,
            'latest_status' => $latestIdm ? $latestIdm->status_idm : 'Belum Ada Data',
            'avg_score' => IdmDesa::avg('skor_idm') ?? 0
        ];

        return view('admin.idm.index', compact('idmData', 'stats'));
    }

    public function create()
    {
        return view('admin.idm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'skor_idm' => 'required|numeric|min:0|max:1000',
            'status_idm' => 'required|in:Sangat Tertinggal,Tertinggal,Berkembang,Maju,Mandiri',
            'skor_iks' => 'required|numeric|min:0|max:1000',
            'skor_ike' => 'required|numeric|min:0|max:1000',
            'skor_ikl' => 'required|numeric|min:0|max:1000',
            'dimensi_sosial' => 'nullable|numeric|min:0|max:1000',
            'dimensi_ekonomi' => 'nullable|numeric|min:0|max:1000',
            'dimensi_lingkungan' => 'nullable|numeric|min:0|max:1000',
            'target_tahun_depan' => 'nullable|numeric|min:0|max:1000',
            'deskripsi' => 'nullable|string|max:2000',
            'is_published' => 'boolean'
        ]);

        // Check if year already exists
        if (IdmDesa::where('tahun', $validated['tahun'])->exists()) {
            return redirect()->back()
                ->withErrors(['tahun' => 'Data IDM untuk tahun ' . $validated['tahun'] . ' sudah ada.'])
                ->withInput();
        }

        $validated['is_published'] = $request->has('is_published');

        IdmDesa::create($validated);

        return redirect()->route('admin.idm.index')
            ->with('success', 'Data IDM berhasil ditambahkan.');
    }

    public function show(IdmDesa $idm)
    {
        return view('admin.idm.show', compact('idm'));
    }

    public function edit(IdmDesa $idm)
    {
        return view('admin.idm.edit', compact('idm'));
    }

    public function update(Request $request, IdmDesa $idm)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2020|max:' . (date('Y') + 5),
            'skor_idm' => 'required|numeric|min:0|max:1000',
            'status_idm' => 'required|in:Sangat Tertinggal,Tertinggal,Berkembang,Maju,Mandiri',
            'skor_iks' => 'required|numeric|min:0|max:1000',
            'skor_ike' => 'required|numeric|min:0|max:1000',
            'skor_ikl' => 'required|numeric|min:0|max:1000',
            'dimensi_sosial' => 'nullable|numeric|min:0|max:1000',
            'dimensi_ekonomi' => 'nullable|numeric|min:0|max:1000',
            'dimensi_lingkungan' => 'nullable|numeric|min:0|max:1000',
            'target_tahun_depan' => 'nullable|numeric|min:0|max:1000',
            'deskripsi' => 'nullable|string|max:2000',
            'is_published' => 'boolean'
        ]);

        // Check if year already exists (except current record)
        if (IdmDesa::where('tahun', $validated['tahun'])->where('id', '!=', $idm->id)->exists()) {
            return redirect()->back()
                ->withErrors(['tahun' => 'Data IDM untuk tahun ' . $validated['tahun'] . ' sudah ada.'])
                ->withInput();
        }

        $validated['is_published'] = $request->has('is_published');

        $idm->update($validated);

        return redirect()->route('admin.idm.index')
            ->with('success', 'Data IDM berhasil diperbarui.');
    }

    public function destroy(IdmDesa $idm)
    {
        $tahun = $idm->tahun;
        $idm->delete();

        return redirect()->route('admin.idm.index')
            ->with('success', 'Data IDM tahun ' . $tahun . ' berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:idm_desa,id'
        ]);

        $deleted = IdmDesa::whereIn('id', $request->ids)->count();
        IdmDesa::whereIn('id', $request->ids)->delete();

        return redirect()->route('admin.idm.index')
            ->with('success', $deleted . ' data IDM berhasil dihapus.');
    }
}
