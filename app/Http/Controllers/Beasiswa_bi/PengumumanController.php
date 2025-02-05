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

    public function downloadFile($id)
    {
        $file = Pengumuman::findOrFail($id);

        if (!$file->file) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        // Path file dalam storage
        $filePath = 'public/' . $file->file;

        // Pastikan file ada dalam storage
        if (!Storage::disk('local')->exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di penyimpanan.');
        }

        // Ambil nama asli file beserta ekstensinya
        $originalFileName = pathinfo($file->file, PATHINFO_FILENAME);
        $extension = pathinfo($file->file, PATHINFO_EXTENSION);
        $downloadFileName = ($file->nama_file ?? $originalFileName) . '.' . $extension;

        // Menggunakan streamDownload agar lebih efisien dalam membaca file
        return Storage::disk('local')->download($filePath, $downloadFileName);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'file_download' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:10240', // Batas ukuran 10MB
            'status' => 'required|in:published,nonaktif',
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
            'file_download' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:10240', // Batas ukuran 10MB
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
