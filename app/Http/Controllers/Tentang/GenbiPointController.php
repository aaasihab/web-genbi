<?php

namespace App\Http\Controllers\Tentang;

use App\Http\Controllers\Controller;
use App\Models\GenbiPoint;
use Illuminate\Http\Request;

class GenbiPointController extends Controller
{
    public function index()
    {
        $genbiPoints = GenbiPoint::orderByRaw("
            FIELD(bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')
        ")->get();

        return view('admin.tentang.genbi_point.index', compact('genbiPoints'));
    }

    public function create()
    {
        $allMonths = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        // Query untuk bulan yang belum terpilih
        $usedMonths = GenbiPoint::select('bulan')->pluck('bulan')->toArray();
        $availableMonths = array_diff($allMonths, $usedMonths);

        return view('admin.tentang.genbi_point.create', compact('availableMonths'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'link_drive' => 'required|url',
            'status' => 'required|in:published,nonaktif',
        ]);

        // Check if the month already exists in the database
        if (GenbiPoint::where('bulan', $validated['bulan'])->exists()) {
            return back()->withErrors(['bulan' => 'Data Genbi Poin pada Bulan ini sudah ada.'])->withInput();
        }

        GenbiPoint::create($validated);

        return redirect()->route('admin.genbi_point.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }


    public function show($id)
    {
        abort(404);
    }

    public function edit($id)
    {
        $genbiPoint = GenbiPoint::findOrFail($id);

        // Daftar bulan yang ada di seluruh tahun
        $allMonths = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

        // Query untuk bulan yang sudah digunakan
        $usedMonths = GenbiPoint::where('bulan', '!=', $genbiPoint->bulan)
            ->pluck('bulan')
            ->toArray();

        // Ambil bulan yang belum digunakan
        $availableMonths = array_diff($allMonths, $usedMonths);

        return view('admin.tentang.genbi_point.edit', compact('genbiPoint', 'availableMonths', 'allMonths'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bulan' => 'required|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
            'link_drive' => 'required|url',
            'status' => 'required|in:published,nonaktif',
        ]);

        $genbiPoint = GenbiPoint::findOrFail($id);

        if ($genbiPoint->bulan !== $validated['bulan'] && GenbiPoint::where('bulan', $validated['bulan'])->exists()) {
            return back()->withErrors(['bulan' => 'Data Genbi Poin pada Bulan ini sudah ada.'])->withInput();
        }

        $genbiPoint->update($validated);

        return redirect()->route('admin.genbi_point.index')
            ->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $genbiPoint = GenbiPoint::findOrFail($id);
        $genbiPoint->delete();

        return redirect()->route('admin.genbi_point.index')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');

        if (!$ids) {
            return redirect()->back()->with('error', 'Tidak ada Genbi Point yang dipilih.');
        }

        GenbiPoint::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', 'Genbi Point yang dipilih berhasil dihapus.');
    }

}

