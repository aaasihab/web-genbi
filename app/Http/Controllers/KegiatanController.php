<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('tanggal', 'desc')->paginate(6);
        return view('kegiatan.index', compact('kegiatan'));
    }
    // Menampilkan form tambah anggota
    public function create()
    {
        return view('kegiatan.create');
    }

    public function show()
    {
        $kegiatan = Kegiatan::all();
        return view('kegiatan.show', compact('kegiatan'));
    }


    // Method untuk menyimpan data Kegiatan (Create)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Jika ada gambar yang diunggah, simpan ke storage
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar_kegiatan', 'public');
        }

        // Simpan ke database
        Kegiatan::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('kegiatan.show')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);

        // Jika ada gambar baru, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('gambar_kegiatan', 'public');
        } else {
            $validated['gambar'] = $kegiatan->gambar;
        }

        // Update data ke database
        $kegiatan->update($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('kegiatan.show')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        // Hapus data dari database
        $kegiatan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('kegiatan.show')->with('success', 'Kegiatan berhasil dihapus');
    }

}

