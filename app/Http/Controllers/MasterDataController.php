<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSurat;

class MasterDataController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::all();
        return view('admin.master_jenis_surat', compact('jenisSurats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        JenisSurat::create($request->only('nama', 'deskripsi'));
        return redirect()->back()->with('success', 'Jenis surat ditambahkan.');
    }

    public function destroy($id)
    {
        JenisSurat::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Jenis surat dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        
        $jenisSurat = JenisSurat::findOrFail($id);
        $jenisSurat->update($request->only('nama', 'deskripsi'));
        
        return redirect()->back()->with('success', 'Jenis surat berhasil diperbarui.');
    }
}
