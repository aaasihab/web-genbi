<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Divisi;
use App\Models\Struktur\PengurusDivisi;
use Cache;
use Illuminate\Http\Request;

class PengurusDivisiController extends Controller
{
    public function index()
    {
        $pengurusDivisi = PengurusDivisi::with('divisi')->get()->sortBy('divisi.nama');;
        return view('admin.tentang.struktur.pengurus_divisi.index', compact('pengurusDivisi'));
    }

    public function create()
    {
        $divisi = Divisi::all();

        // Cek apakah semua divisi sudah memiliki CO dan SekCO
        $filledPositions = PengurusDivisi::select('divisi_id')
            ->whereIn('jabatan', ['CO', 'SekCO'])
            ->groupBy('divisi_id')
            ->havingRaw('COUNT(DISTINCT jabatan) >= 2')
            ->pluck('divisi_id')
            ->toArray();

        if (count($filledPositions) == Divisi::count()) {
            return redirect()->route('admin.pengurus_divisi.index')
                ->with('error', 'Semua divisi sudah memiliki CO dan SekCO. Tidak dapat menambah pengurus divisi baru.');
        }

        return view('admin.tentang.struktur.pengurus_divisi.create', compact('divisi'));
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

        // Cek apakah CO dan SekCO sudah terisi dalam divisi ini
        $filledPositions = PengurusDivisi::where('divisi_id', $request->divisi_id)
            ->whereIn('jabatan', ['CO', 'SekCO'])
            ->pluck('jabatan')
            ->toArray();

        if (count($filledPositions) >= 2) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jabatan' => 'Semua jabatan (CO dan SekCO) sudah terisi di divisi ini.']);
        }

        // Cek apakah jabatan yang dipilih sudah ada dalam divisi
        if (in_array($request->jabatan, $filledPositions)) {
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


        // Hapus cache agar data terbaru dimuat
        Cache::forget('struktur_organisasi');

        return redirect()->route('admin.pengurus_divisi.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengurusDivisi = PengurusDivisi::findOrFail($id);
        $divisi = Divisi::all();
        return view('admin.tentang.struktur.pengurus_divisi.edit', compact('pengurusDivisi', 'divisi'));
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

        // Cek apakah ada orang lain dengan jabatan yang sama di divisi ini
        $existingPengurus = PengurusDivisi::where('divisi_id', $request->divisi_id)
            ->where('jabatan', $request->jabatan)
            ->where('id', '!=', $id) // Pastikan tidak mengecek dirinya sendiri
            ->exists();

        if ($existingPengurus) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jabatan' => 'Jabatan ' . $request->jabatan . ' sudah terisi di divisi ini.']);
        }

        // Update foto jika ada file baru yang diunggah
        if ($request->hasFile('foto')) {
            if ($pengurusDivisi->foto) {
                \Storage::delete('public/' . $pengurusDivisi->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus_divisi', 'public');
        }

        // Perbarui data pengurus divisi
        $pengurusDivisi->update($validated);
        // Hapus cache agar data terbaru dapat diambil
        Cache::forget('struktur_organisasi');

        return redirect()->route('admin.pengurus_divisi.index')
            ->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $pengurusDivisi = PengurusDivisi::findOrFail($id);
        if ($pengurusDivisi->foto) {
            \Storage::delete('public/' . $pengurusDivisi->foto);
        }
        $pengurusDivisi->delete();

        // Hapus cache agar data terbaru dapat diambil
        Cache::forget('struktur_organisasi');

        return redirect()->route('admin.pengurus_divisi.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}

