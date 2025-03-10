<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Storage;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('tanggal_kegiatan', 'asc')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function show($id)
    {
        abort(404);
    }

    // Menampilkan form tambah anggota
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    // Method untuk menyimpan data Kegiatan (Create)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_kegiatan' => 'required|date', // Biarkan nullable agar bisa diisi otomatis
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic|max:10240',
            'status' => 'required|in:published,nonaktif'
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar_kegiatan', 'public');
        }

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }


    public function edit(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal_kegiatan' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,heic|max:10240',
            'status' => 'required|in:published,nonaktif'
        ]);

        // Set tanggal_kegiatan ke hari ini
        $kegiatan = Kegiatan::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('gambar_kegiatan', 'public');
        } else {
            $validated['gambar'] = $kegiatan->gambar;
        }

        $validated['tanggal_post'] = now()->toDateString();
        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada kegiatan yang dipilih.');
        }

        $kegiatan = Kegiatan::whereIn('id', $ids)->get();

        foreach ($kegiatan as $item) {
            // Hapus gambar dari storage jika ada
            if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
                Storage::disk('public')->delete($item->gambar);
            }

            $item->delete();
        }

        return redirect()->back()->with('success', 'Kegiatan berhasil dihapus.');
    }


}

