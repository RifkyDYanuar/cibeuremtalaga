<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Log;

class PublicPageController extends Controller
{
    public function tentang()
    {
        return view('public.tentang');
    }
    
    public function berita()
    {
        $pengumuman = Pengumuman::with('creator')
            ->orderBy('created_at', 'desc')
            ->paginate(9);
            
        $featuredNews = Pengumuman::where('is_featured', true)
            ->with('creator')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        $popularNews = Pengumuman::with('creator')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
            
        return view('public.berita', compact('pengumuman', 'featuredNews', 'popularNews'));
    }
    
    public function beritaDetail(Pengumuman $pengumuman)
    {
        // Get related announcements from same category
        $relatedAnnouncements = Pengumuman::where('kategori', $pengumuman->kategori)
            ->where('id', '!=', $pengumuman->id)
            ->with('creator')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
            
        return view('public.berita-detail', compact('pengumuman', 'relatedAnnouncements'));
    }
    
    public function agenda()
    {
        return view('public.agenda');
    }
    
    public function kontak()
    {
        return view('public.kontak');
    }
    
    public function storeKontak(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Simpan pesan kontak ke log atau database
        // Untuk saat ini, kita akan log pesan tersebut
        Log::info('Pesan Kontak Baru', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('public.kontak')->with('success', 'Terima kasih! Pesan Anda telah dikirim. Tim kami akan segera merespons.');
    }
    
    public function layananDetail()
    {
        return view('public.layanan-detail');
    }
    
    public function panduan()
    {
        return view('public.panduan');
    }
}
