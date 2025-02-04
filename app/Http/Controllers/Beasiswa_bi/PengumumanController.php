<?php

namespace App\Http\Controllers\Beasiswa_bi;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::where('status', 'published')
            ->orderBy('created_at', 'asc') // Mengurutkan dari yang terlama dibuat
            ->get();

        return view('beasiswa_bi.pengumuman.index', compact('pengumuman'));
    }

    public function show()
    {
        $pengumuman = Pengumuman::all();
        return view('beasiswa_bi.pengumuman.show', compact('pengumuman'));
    }

    public function create()
    {
        return view('beasiswa_bi.pengumuman.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('pengumuman', 'public');
        }

        // Simpan data ke database
        Pengumuman::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('pengumuman.show')->with('success', 'Pengumuman berhasil ditambahkan');
    }
    public function edit(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        return view('beasiswa_bi.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:published,nonaktif'
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
                Storage::disk('public')->delete($pengumuman->gambar);
            }
            // Simpan gambar baru
            $validated['gambar'] = $request->file('gambar')->store('pengumuman', 'public');
        } else {
            $validated['gambar'] = $pengumuman->gambar;
        }

        $pengumuman->update($validated);

        return redirect()->route('pengumuman.show')->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        // Hapus data dari database
        $pengumuman->delete();

        return redirect()->route('pengumuman.show')->with('success', 'Pengumuman berhasil dihapus.');
    }

}
