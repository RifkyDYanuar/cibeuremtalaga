<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pengumuman::with('creator')->orderBy('created_at', 'desc');

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->byKategori($request->kategori);
        }

        // Filter by prioritas
        if ($request->filled('prioritas')) {
            $query->byPrioritas($request->prioritas);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->active();
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $pengumuman = $query->paginate(10);

        return view('admin.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|in:umum,penting,kegiatan,pembangunan,kesehatan,pendidikan',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'is_active' => 'boolean',
            'is_featured' => 'boolean'
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('pengumuman', 'public');
        }

        Pengumuman::create($data);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'kategori' => 'required|in:umum,penting,kegiatan,pembangunan,kesehatan,pendidikan',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'is_active' => 'boolean',
            'is_featured' => 'boolean'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($pengumuman->gambar) {
                Storage::disk('public')->delete($pengumuman->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('pengumuman', 'public');
        }

        $pengumuman->update($data);

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        // Delete image if exists
        if ($pengumuman->gambar) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        $pengumuman->delete();

        return redirect()->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }

    /**
     * Display a listing of announcements for users
     */
    public function userIndex(Request $request)
    {
        $query = Pengumuman::active()->with('creator');

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->byKategori($request->kategori);
        }

        // Search by title
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Get featured announcements
        $featuredAnnouncements = Pengumuman::active()
            ->where('is_featured', true)
            ->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Get regular announcements
        $announcements = $query->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('user.pengumuman.index', compact('announcements', 'featuredAnnouncements'));
    }

    /**
     * Display the specified announcement for users
     */
    public function userShow(Pengumuman $pengumuman)
    {
        // Check if announcement is active
        if (!$pengumuman->is_active) {
            abort(404);
        }

        // Get related announcements
        $relatedAnnouncements = Pengumuman::active()
            ->where('id', '!=', $pengumuman->id)
            ->where('kategori', $pengumuman->kategori)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('user.pengumuman.show', compact('pengumuman', 'relatedAnnouncements'));
    }

    /**
     * Display a listing of announcements for public
     */
    public function publicIndex(Request $request)
    {
        // If ID is provided, show single announcement
        if ($request->filled('id')) {
            return $this->publicShow($request->id);
        }
        
        $query = Pengumuman::active()->with('creator');

        // Filter by kategori
        if ($request->filled('kategori')) {
            $query->byKategori($request->kategori);
        }

        // Search by title
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Get featured announcements
        $featuredAnnouncements = Pengumuman::active()
            ->where('is_featured', true)
            ->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Get regular announcements
        $announcements = $query->orderBy('prioritas', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('pengumuman-public', compact('announcements', 'featuredAnnouncements'));
    }

    /**
     * Display the specified announcement for public
     */
    public function publicShow($id)
    {
        $pengumuman = Pengumuman::active()->with('creator')->findOrFail($id);
        
        // Get related announcements
        $relatedAnnouncements = Pengumuman::active()
            ->where('id', '!=', $pengumuman->id)
            ->where('kategori', $pengumuman->kategori)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('pengumuman-detail', compact('pengumuman', 'relatedAnnouncements'));
    }
}
