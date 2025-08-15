<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PembangunanController extends Controller
{
    public function index()
    {
        $pembangunan = Pembangunan::latest()->paginate(10);
        
        // Statistics
        $totalProyek = Pembangunan::count();
        $proyekSelesai = Pembangunan::where('status', 'selesai')->count();
        $proyekProses = Pembangunan::where('status', 'proses')->count();
        $totalAnggaran = Pembangunan::sum('anggaran');
        
        return view('admin.pembangunan.index', compact(
            'pembangunan', 'totalProyek', 'proyekSelesai', 'proyekProses', 'totalAnggaran'
        ));
    }

    public function create()
    {
        return view('admin.pembangunan.form');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:infrastruktur,pendidikan,kesehatan,ekonomi,sosial,lingkungan,lainnya',
            'status' => 'required|in:perencanaan,proses,selesai,ditunda',
            'anggaran' => 'required|numeric|min:0',
            'realisasi' => 'nullable|numeric|min:0',
            'sumber_dana' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
            'tanggal_target' => 'required|date|after:tanggal_mulai',
            'progress' => 'required|integer|min:0|max:100',
            'penanggung_jawab' => 'required|string|max:255',
            'kontraktor' => 'nullable|string|max:255',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'keterangan' => 'nullable|string',
            'is_published' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $request->except(['gambar']);
        $data['is_published'] = $request->has('is_published');

        // Handle multiple image uploads
        if ($request->hasFile('gambar')) {
            $images = [];
            foreach ($request->file('gambar') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('pembangunan', $filename, 'public');
                $images[] = $filename;
            }
            $data['gambar'] = $images;
        }

        Pembangunan::create($data);

        return redirect()->route('admin.pembangunan.index')
                        ->with('success', 'Data pembangunan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pembangunan = Pembangunan::findOrFail($id);
        return view('admin.pembangunan.show', compact('pembangunan'));
    }

    public function edit($id)
    {
        $pembangunan = Pembangunan::findOrFail($id);
        return view('admin.pembangunan.form', compact('pembangunan'));
    }

    public function update(Request $request, $id)
    {
        $pembangunan = Pembangunan::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'nama_proyek' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|in:infrastruktur,pendidikan,kesehatan,ekonomi,sosial,lingkungan,lainnya',
            'status' => 'required|in:perencanaan,proses,selesai,ditunda',
            'anggaran' => 'required|numeric|min:0',
            'realisasi' => 'nullable|numeric|min:0',
            'sumber_dana' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after:tanggal_mulai',
            'tanggal_target' => 'required|date|after:tanggal_mulai',
            'progress' => 'required|integer|min:0|max:100',
            'penanggung_jawab' => 'required|string|max:255',
            'kontraktor' => 'nullable|string|max:255',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'keterangan' => 'nullable|string',
            'is_published' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $data = $request->except(['gambar']);
        $data['is_published'] = $request->has('is_published');

        // Handle multiple image uploads
        if ($request->hasFile('gambar')) {
            // Delete old images
            if ($pembangunan->gambar) {
                foreach ($pembangunan->gambar as $oldImage) {
                    if (Storage::disk('public')->exists('pembangunan/' . $oldImage)) {
                        Storage::disk('public')->delete('pembangunan/' . $oldImage);
                    }
                }
            }

            $images = [];
            foreach ($request->file('gambar') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('pembangunan', $filename, 'public');
                $images[] = $filename;
            }
            $data['gambar'] = $images;
        }

        $pembangunan->update($data);

        return redirect()->route('admin.pembangunan.index')
                        ->with('success', 'Data pembangunan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembangunan = Pembangunan::findOrFail($id);

        // Delete images
        if ($pembangunan->gambar) {
            foreach ($pembangunan->gambar as $image) {
                if (Storage::disk('public')->exists('pembangunan/' . $image)) {
                    Storage::disk('public')->delete('pembangunan/' . $image);
                }
            }
        }

        $pembangunan->delete();

        return redirect()->route('admin.pembangunan.index')
                        ->with('success', 'Data pembangunan berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:pembangunan,id'
        ]);

        $deleted = 0;
        $pembangunanList = Pembangunan::whereIn('id', $request->ids)->get();

        foreach ($pembangunanList as $pembangunan) {
            // Delete images
            if ($pembangunan->gambar) {
                foreach ($pembangunan->gambar as $image) {
                    if (Storage::disk('public')->exists('pembangunan/' . $image)) {
                        Storage::disk('public')->delete('pembangunan/' . $image);
                    }
                }
            }

            $pembangunan->delete();
            $deleted++;
        }

        return redirect()->route('admin.pembangunan.index')
                        ->with('success', "Berhasil menghapus {$deleted} data pembangunan.");
    }
}
