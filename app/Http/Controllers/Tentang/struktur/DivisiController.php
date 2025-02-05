<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Divisi;
use App\Models\Struktur\Organisasi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::with('organisasi')->get();
        return view('tentang.struktur.divisi.index', compact('divisi'));
    }

    public function create()
    {
        $organisasi = Organisasi::all();
        return view('tentang.struktur.divisi.create', compact('organisasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required|exists:organisasi,id',
            'nama' => 'required|string|max:255',
        ]);

        Divisi::create($validated);

        return redirect()->route('divisi.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $divisi = Divisi::findOrFail($id);
        $organisasi = Organisasi::all();
        return view('tentang.struktur.divisi.edit', compact('divisi', 'organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validated  = $request->validate([
            'organisasi_id' => 'required|exists:organisasi,id',
            'nama' => 'required|string|max:255',
        ]);

        $divisi = Divisi::findOrFail($id);

        $divisi->update($validated );

        return redirect()->route('divisi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $divisi = Divisi::findOrFail($id);
        $divisi->delete();

        return redirect()->route('divisi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}

