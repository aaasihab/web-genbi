<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Divisi;
use App\Models\Struktur\PengurusDivisi;
use Illuminate\Http\Request;

class PengurusDivisiController extends Controller
{
    public function index()
    {
        $pengurusDivisi = PengurusDivisi::with('divisi')->get();
        return view('tentang.struktur.pengurus_divisi.index', compact('pengurusDivisi'));
    }

    public function create()
    {
        $divisi = Divisi::all();
        return view('tentang.struktur.pengurus_divisi.create', compact('divisi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisi,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:CO,SekCO',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:published,nonaktif',
        ]);

        // Cek apakah sudah ada yang menjabat sebagai CO atau SekCO di divisi ini
        $existingPengurus = PengurusDivisi::where('divisi_id', $request->divisi_id)
            ->where('jabatan', $request->jabatan)
            ->exists(); // Akan mengembalikan true jika sudah ada

        if ($existingPengurus) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jabatan' => 'Jabatan ' . $request->jabatan . ' sudah terisi di divisi ini.']);
        }

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus_divisi', 'public');
        }

        // Simpan data pengurus
        PengurusDivisi::create($validated);

        return redirect()->route('pengurus_divisi.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $pengurusDivisi = PengurusDivisi::findOrFail($id);
        $divisi = Divisi::all();
        return view('tentang.struktur.pengurus_divisi.edit', compact('pengurusDivisi', 'divisi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'divisi_id' => 'required|exists:divisi,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:CO,SekCO',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:published,nonaktif',
        ]);

        $pengurusDivisi = PengurusDivisi::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($pengurusDivisi->foto) {
                \Storage::delete('public/' . $pengurusDivisi->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus_divisi', 'public');
        }

        $pengurusDivisi->update($validated);

        return redirect()->route('pengurus_divisi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengurusDivisi = PengurusDivisi::findOrFail($id);
        if ($pengurusDivisi->foto) {
            \Storage::delete('public/' . $pengurusDivisi->foto);
        }
        $pengurusDivisi->delete();

        return redirect()->route('pengurus_divisi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}

