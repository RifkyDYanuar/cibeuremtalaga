<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicIndex', 'publicShow']);
        $this->middleware('admin')->except(['publicIndex', 'publicShow']);
    }

    // Admin Methods
    public function index()
    {
        $agendas = Agenda::with('creator')->latest()->paginate(10);
        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|in:rapat,acara,kegiatan,musyawarah,pelatihan,lainnya',
            'status' => 'required|in:aktif,selesai,dibatalkan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('agenda', 'public');
        }

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function show(Agenda $agenda)
    {
        return view('admin.agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|in:rapat,acara,kegiatan,musyawarah,pelatihan,lainnya',
            'status' => 'required|in:aktif,selesai,dibatalkan',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($agenda->gambar) {
                Storage::disk('public')->delete($agenda->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('agenda', 'public');
        }

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui');
    }

    public function destroy(Agenda $agenda)
    {
        if ($agenda->gambar) {
            Storage::disk('public')->delete($agenda->gambar);
        }

        $agenda->delete();

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus');
    }

    // Public Methods
    public function publicIndex()
    {
        $agendas = Agenda::aktif()->with('creator')->latest('tanggal_mulai')->paginate(12);
        return view('public.agenda', compact('agendas'));
    }

    public function publicShow($id)
    {
        $agenda = Agenda::findOrFail($id);
        $relatedAgendas = Agenda::aktif()
            ->where('kategori', $agenda->kategori)
            ->where('id', '!=', $agenda->id)
            ->upcoming()
            ->limit(3)
            ->get();

        return view('agenda-detail', compact('agenda', 'relatedAgendas'));
    }
}
