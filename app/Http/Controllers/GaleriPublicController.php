<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriPublicController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        $search = $request->get('search');
        
        $query = Galeri::active()->with('creator');
        
        if ($kategori) {
            $query->byKategori($kategori);
        }
        
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('lokasi', 'like', '%' . $search . '%');
            });
        }
        
        $featured = Galeri::active()
            ->featured()
            ->orderBy('urutan', 'asc')
            ->limit(6)
            ->get();
            
        $galeris = $query->orderBy('is_featured', 'desc')
            ->orderBy('urutan', 'asc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            
        $kategoriOptions = Galeri::getKategoriOptions();
        $kategoriCounts = [];
        
        foreach ($kategoriOptions as $key => $label) {
            $kategoriCounts[$key] = Galeri::active()->byKategori($key)->count();
        }
        
        return view('galeri.index', compact('galeris', 'featured', 'kategoriOptions', 'kategoriCounts', 'kategori', 'search'));
    }

    public function show(Galeri $galeri)
    {
        if (!$galeri->status) {
            abort(404);
        }
        
        $related = Galeri::active()
            ->where('id', '!=', $galeri->id)
            ->where('kategori', $galeri->kategori)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
            
        return view('galeri.show', compact('galeri', 'related'));
    }
}
