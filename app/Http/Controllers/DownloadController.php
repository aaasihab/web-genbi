<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Storage;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::all(); // Ambil semua data dari tabel downloads
        return view('download.index', compact('downloads'));
    }

    public function show()
    {
        $files = Download::all();
        return view('download.show', compact('files'));
    }
    public function downloadFile($id)
    {
        $file = Download::findOrFail($id);

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
        return view('download.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx,jpg,jpeg,png|max:5120', // Batas ukuran 2MB
            'status' => 'required|in:published,nonaktif',
        ]);

        // Upload file
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('downloads', 'public');
        } else {
            return back()->with('error', 'File gagal diunggah.');
        }

        // Simpan ke database
        Download::create([
            'nama_file' => $request->nama_file,
            'file' => $filePath,
            'status' => $request->status,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('download.show')->with('success', 'File berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $download = Download::findOrFail($id);
        return view('download.edit', compact('download'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,xlsx,xls,ppt,pptx,jpg,jpeg,png|max:5120',
            'status' => 'required|in:published,nonaktif'
        ]);
        
        $download = Download::findOrFail($id);

        if ($request->hasFile('file')) {
            if ($download->file) {
                Storage::disk('public')->delete($download->file);
            }
            $validated['file'] = $request->file('file')->store('downloads', 'public');
        } else {
            $validated['file'] = $download->file;
        }

        $download->update($validated);

        return redirect()->route('download.show')->with('success', 'File berhasil diperbarui');
    }


    public function destroy(string $id)
    {
        $file = Download::findOrFail($id);

        // Hapus file dari storage jika ada
        if ($file->file && Storage::disk('public')->exists($file->file)) {
            Storage::disk('public')->delete($file->file);
        }

        // Hapus data dari database
        $file->delete();

        return redirect()->route('download.show')->with('success', 'File berhasil dihapus.');
    }


}
