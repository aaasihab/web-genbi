<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Anggota;
use App\Models\Struktur\Divisi;
use Illuminate\Http\Request;


class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::with('divisi')->get();
        return view('tentang.struktur.anggota.index', compact('anggota'));
    }

    public function create()
    {
        $divisi = Divisi::all();
        return view('tentang.struktur.anggota.create', compact('divisi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisi,id',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:published,nonaktif',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        Anggota::create($validated);

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $divisi = Divisi::all();
        return view('tentang.struktur.anggota.edit', compact('anggota', 'divisi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisi,id',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:published,nonaktif',
        ]);

        $anggota = Anggota::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($anggota->foto) {
                \Storage::delete('public/' . $anggota->foto);
            }
            $validated['foto'] = $request->file('foto')->store('anggota', 'public');
        }

        $anggota->update($validated);

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        if ($anggota->foto) {
            \Storage::delete('public/' . $anggota->foto);
        }
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus.');
    }
}

