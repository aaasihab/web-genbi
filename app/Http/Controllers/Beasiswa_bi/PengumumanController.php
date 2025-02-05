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
        $pengumuman = Pengumuman::all();
        return view('beasiswa_bi.pengumuman.show', compact('pengumuman'));
    }

    public function show()
    {

    }

    public function downloadFile($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        if (!$pengumuman) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        // Path file dalam storage
        $filePath = 'public/' . $pengumuman->file_download;

        // Pastikan file ada dalam storage
        if (!Storage::disk('local')->exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan di penyimpanan.');
        }

        // Ambil nama asli file beserta ekstensinya
        $originalFileName = pathinfo($pengumuman->file_download, PATHINFO_FILENAME);
        $extension = pathinfo($pengumuman->file_download, PATHINFO_EXTENSION);
        $downloadFileName = ($pengumuman->judul ?? $originalFileName) . '.' . $extension;

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

        // Cek apakah kedua file diunggah sebelum menyimpan
        if (!$request->hasFile('gambar') || !$request->hasFile('file_download')) {
            return redirect()->route('pengumuman.show')->with('error', 'Gagal menambah data Pengumuman, file tidak lengkap.');
        }

        // Simpan file yang diunggah
        $validated['gambar'] = $request->file('gambar')->store('pengumuman/gambar', 'public');
        $validated['file_download'] = $request->file('file_download')->store('pengumuman/file_download', 'public');

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
            'file_download' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx|max:10240',
            'status' => 'required|in:published,nonaktif'
        ]);

        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus gambar lama jika ada file baru
        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
                Storage::disk('public')->delete($pengumuman->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('pengumuman', 'public');
        } else {
            unset($validated['gambar']); // Jangan menghapus gambar lama jika tidak ada unggahan baru
        }

        // Hapus file lama jika ada file baru
        if ($request->hasFile('file_download')) {
            if ($pengumuman->file_download && Storage::disk('public')->exists($pengumuman->file_download)) {
                Storage::disk('public')->delete($pengumuman->file_download);
            }
            $validated['file_download'] = $request->file('file_download')->store('pengumuman', 'public');
        } else {
            unset($validated['file_download']); // Jangan menghapus file lama jika tidak ada unggahan baru
        }

        $pengumuman->fill($validated);
        $pengumuman->save();

        return redirect()->route('pengumuman.show')->with('success', 'Pengumuman berhasil diperbarui');
    }


    public function destroy(string $id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($pengumuman->gambar && Storage::disk('public')->exists($pengumuman->gambar)) {
            Storage::disk('public')->delete($pengumuman->gambar);
        }

        // Hapus gambar dari storage jika ada
        if ($pengumuman->file_download && Storage::disk('public')->exists($pengumuman->file_download)) {
            Storage::disk('public')->delete($pengumuman->file_download);
        }

        // Hapus data dari database
        $pengumuman->delete();

        return redirect()->route('pengumuman.show')->with('success', 'Pengumuman berhasil dihapus.');
    }

}
