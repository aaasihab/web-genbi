<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Organisasi;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{

    public function index()
    {
        $organisasi = Organisasi::all();
        return view('tentang.struktur.organisasi.index', compact('organisasi'));
    }

    public function create()
    {
        return view('tentang.struktur.organisasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Organisasi::create($validated);

        return redirect()->route('organisasi.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show()
    {

    }

    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('tentang.struktur.organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $organisasi = Organisasi::findOrFail($id);
        $organisasi->update($validated);

        return redirect()->route('organisasi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        if ($organisasi->divisi()->count() > 0 || $organisasi->pengurusHarian()->count() > 0) {
            // Jika ada relasi dengan buku, kembalikan pesan error
            return redirect()->route('organisasi.index')
                ->with('error', 'Data Organisasi ini tidak bisa dihapus karena terdapat relasi dengan data lain');
        }

        $organisasi->delete();

        return redirect()->route('organisasi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
