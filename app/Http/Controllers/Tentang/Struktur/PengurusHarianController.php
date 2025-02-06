<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Organisasi;
use App\Models\Struktur\PengurusHarian;
use Illuminate\Http\Request;

class PengurusHarianController extends Controller
{
    public function index()
    {
        $pengurusHarian = PengurusHarian::with('organisasi')->get();
        return view('tentang.struktur.pengurus_harian.index', compact('pengurusHarian'));
    }

    public function create()
    {
        $organisasi = Organisasi::all();
        return view('tentang.struktur.pengurus_harian.create', compact('organisasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required|exists:organisasi,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua,Sekretaris,Bendahara',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:published,nonaktif'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus_harian', 'public');
        }

        PengurusHarian::create($validated);

        return redirect()->route('pengurus_harian.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengurusHarian = PengurusHarian::findOrFail($id);
        $organisasi = Organisasi::all();
        return view('tentang.struktur.pengurus_harian.edit', compact('pengurusHarian', 'organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required|exists:organisasi,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua,Sekretaris,Bendahara',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:published,nonaktif'
        ]);

        $pengurus = PengurusHarian::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengurus->foto) {
                \Storage::disk('public')->delete($pengurus->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus_harian', 'public');
        }

        $pengurus->update($validated);

        return redirect()->route('pengurus_harian.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pengurus = PengurusHarian::findOrFail($id);

        // Hapus foto jika ada
        if ($pengurus->foto) {
            \Storage::disk('public')->delete($pengurus->foto);
        }

        $pengurus->delete();

        return redirect()->route('pengurus_harian.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
