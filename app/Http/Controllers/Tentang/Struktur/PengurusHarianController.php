<?php

namespace App\Http\Controllers\Tentang\Struktur;

use App\Http\Controllers\Controller;
use App\Models\Struktur\Organisasi;
use App\Models\Struktur\PengurusHarian;
use Cache;
use Illuminate\Http\Request;

class PengurusHarianController extends Controller
{
    public function index()
    {
        $pengurusHarian = PengurusHarian::with('organisasi')->get();
        return view('admin.tentang.struktur.pengurus_harian.index', compact('pengurusHarian'));
    }

    public function create()
    {
        $organisasi = Organisasi::all();

        // Cek apakah semua jabatan sudah terisi dalam setiap organisasi
        $filledPositions = PengurusHarian::select('organisasi_id')
            ->whereIn('jabatan', ['Ketua', 'Sekretaris', 'Bendahara', 'PJ_Komisariat'])
            ->groupBy('organisasi_id')
            ->havingRaw('COUNT(DISTINCT jabatan) >= 4')
            ->pluck('organisasi_id')
            ->toArray();

        if (count($filledPositions) == Organisasi::count()) {
            return redirect()->route('admin.pengurus_harian.index')
                ->with('error', 'Jabatan di organisasi ini sudah memiliki Ketua, Sekretaris, dan Bendahara. Tidak dapat menambah pengurus harian baru.');
        }

        return view('admin.tentang.struktur.pengurus_harian.create', compact('organisasi'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required|exists:organisasi,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua,Sekretaris,Bendahara,PJ_Komisariat',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:published,nonaktif'
        ]);

        // Cek apakah semua jabatan sudah terisi dalam organisasi ini
        $filledPositions = PengurusHarian::where('organisasi_id', $request->organisasi_id)
            ->whereIn('jabatan', ['Ketua', 'Sekretaris', 'Bendahara','PJ_Komisariat'])
            ->pluck('jabatan')
            ->toArray();

        if (count($filledPositions) >= 4) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jabatan' => 'Semua jabatan (Ketua, Sekretaris, Bendahara, PJ_Komisariat) sudah terisi dalam organisasi ini.']);
        }

        // Cek apakah jabatan yang dipilih sudah ada dalam organisasi
        if (in_array($request->jabatan, $filledPositions)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jabatan' => 'Jabatan ' . $request->jabatan . ' sudah terisi dalam organisasi ini.']);
        }

        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus_harian', 'public');
        }

        // Simpan data pengurus
        PengurusHarian::create($validated);

        // Hapus cache agar data terbaru dapat diambil
        Cache::forget('struktur_organisasi');

        return redirect()->route('admin.pengurus_harian.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pengurusHarian = PengurusHarian::findOrFail($id);
        $organisasi = Organisasi::all();
        return view('admin.tentang.struktur.pengurus_harian.edit', compact('pengurusHarian', 'organisasi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'organisasi_id' => 'required|exists:organisasi,id',
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|in:Ketua,Sekretaris,Bendahara,PJ_Komisariat',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'status' => 'required|in:published,nonaktif'
        ]);

        $pengurus = PengurusHarian::findOrFail($id);

        // Cek apakah ada orang lain dalam organisasi ini yang sudah memiliki jabatan tersebut
        $existingPengurus = PengurusHarian::where('organisasi_id', $request->organisasi_id)
            ->where('jabatan', $request->jabatan)
            ->where('id', '!=', $id) // Pastikan tidak mengecek dirinya sendiri
            ->exists();

        if ($existingPengurus) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['jabatan' => 'Jabatan ' . $request->jabatan . ' sudah terisi dalam organisasi ini.']);
        }

        // Update foto jika ada file baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengurus->foto) {
                \Storage::disk('public')->delete($pengurus->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus_harian', 'public');
        }

        // Perbarui data pengurus harian
        $pengurus->update($validated);
        // Hapus cache agar data terbaru dapat diambil
        Cache::forget('struktur_organisasi');

        return redirect()->route('admin.pengurus_harian.index')
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
        // Hapus cache agar data terbaru dapat diambil
        Cache::forget('struktur_organisasi');

        return redirect()->route('admin.pengurus_harian.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
