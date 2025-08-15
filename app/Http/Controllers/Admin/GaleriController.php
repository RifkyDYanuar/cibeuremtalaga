<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        // Get statistics
        $totalGaleri = Galeri::count();
        $galeriAktif = Galeri::where('status', true)->count();
        $galeriTidakAktif = Galeri::where('status', false)->count();
        $kategoris = ['kegiatan', 'pembangunan', 'acara', 'fasilitas', 'lingkungan', 'lainnya'];
        
        // Build query with filters
        $query = Galeri::with('creator');
        
        // Filter by category
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $status = $request->status === 'aktif' ? true : false;
            $query->where('status', $status);
        }
        
        // Search functionality
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        
        $galeris = $query->orderBy('is_featured', 'desc')
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        return view('admin.galeri.index', compact(
            'galeris', 
            'totalGaleri', 
            'galeriAktif', 
            'galeriTidakAktif', 
            'kategoris'
        ));
    }

    public function create()
    {
        $kategoriOptions = Galeri::getKategoriOptions();
        return view('admin.galeri.create', compact('kategoriOptions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kategori' => 'required|in:kegiatan,pembangunan,acara,fasilitas,lingkungan,lainnya',
            'tanggal_foto' => 'nullable|date',
            'lokasi' => 'nullable|string|max:255',
            'fotografer' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'urutan' => 'integer|min:0',
            'status' => 'boolean'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();
        
        // Handle file upload
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('galeri', $filename, 'public');
            $data['gambar'] = $filename;
        }

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil ditambahkan ke galeri.');
    }

    public function show(Galeri $galeri)
    {
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit(Galeri $galeri)
    {
        $kategoriOptions = Galeri::getKategoriOptions();
        return view('admin.galeri.edit', compact('galeri', 'kategoriOptions'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'kategori' => 'required|in:kegiatan,pembangunan,acara,fasilitas,lingkungan,lainnya',
            'tanggal_foto' => 'nullable|date',
            'lokasi' => 'nullable|string|max:255',
            'fotografer' => 'nullable|string|max:255',
            'is_featured' => 'boolean',
            'urutan' => 'integer|min:0',
            'status' => 'boolean'
        ]);

        $data = $request->all();
        
        // Handle file upload
        if ($request->hasFile('gambar')) {
            // Delete old image
            if ($galeri->gambar && Storage::disk('public')->exists('galeri/' . $galeri->gambar)) {
                Storage::disk('public')->delete('galeri/' . $galeri->gambar);
            }
            
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('galeri', $filename, 'public');
            $data['gambar'] = $filename;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil diupdate.');
    }

    public function destroy(Galeri $galeri)
    {
        // Delete image file
        if ($galeri->gambar && Storage::disk('public')->exists('galeri/' . $galeri->gambar)) {
            Storage::disk('public')->delete('galeri/' . $galeri->gambar);
        }
        
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil dihapus dari galeri.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'galeri_ids' => 'required|array',
            'galeri_ids.*' => 'exists:galeris,id'
        ]);

        $galeris = Galeri::whereIn('id', $request->galeri_ids)->get();
        
        foreach ($galeris as $galeri) {
            // Delete image file
            if ($galeri->gambar && Storage::disk('public')->exists('galeri/' . $galeri->gambar)) {
                Storage::disk('public')->delete('galeri/' . $galeri->gambar);
            }
            $galeri->delete();
        }

        return redirect()->route('admin.galeri.index')
            ->with('success', count($request->galeri_ids) . ' foto berhasil dihapus dari galeri.');
    }
}
