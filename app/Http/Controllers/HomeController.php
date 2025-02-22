<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\GenbiPoint;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
use App\Models\Struktur\Anggota;
use App\Models\Struktur\Divisi;
use App\Models\Struktur\Organisasi;
use App\Models\Struktur\PengurusHarian;
use Cache;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function beranda()
    {
        $kegiatan = Kegiatan::where('status', 'published') // Hanya kegiatan yang aktif
            ->orderBy('tanggal_kegiatan', 'desc')
            ->take(3)
            ->get();

        // $anggota = Anggota::where('status', 'published')->orderBy('nama', 'desc')
        //     ->take(3)
        //     ->get();
        $anggota = Anggota::whereIn('nama', [
            'MUHAMMAD AFANDI',
            'MEIRIKE DIANA EKA LESTARI',
            'SAIYIDATUL KAMALIA SAUDAH'
        ])
            ->orderByRaw("FIELD(nama, 'MUHAMMAD AFANDI', 'MEIRIKE DIANA EKA LESTARI', 'SAIYIDATUL KAMALIA SAUDAH')")
            ->get();


        return view('home.beranda', compact('kegiatan', 'anggota'));
    }

    public function kegiatan()
    {
        $kegiatan = Kegiatan::where('status', 'published')
            ->orderBy('tanggal_kegiatan', 'desc')
            ->get();

        return view('home.kegiatan', compact('kegiatan'));
    }

    public function detailKegiatan($id)
    {
        $kegiatan = Kegiatan::where('status', 'published')->findOrFail($id);
        return view('home.detailKegiatan', compact('kegiatan'));
    }

    public function download()
    {
        $downloads = Download::where('status', 'published')
            ->orderBy('created_at', 'asc') // Mengurutkan dari yang terlama dibuat
            ->get();
        return view('home.download', compact('downloads'));
    }

    // beasiswa bi
    public function persyaratan()
    {
        return view('home.beasiswa_bi.persyaratan');
    }

    public function tentangBi()
    {
        return view('home.beasiswa_bi.tentangBi');
    }

    public function pengumuman()
    {
        $pengumuman = Pengumuman::where('status', 'published')
            ->orderBy('created_at', 'asc') // Mengurutkan dari yang terlama dibuat
            ->get();

        return view('home.beasiswa_bi.pengumuman', compact('pengumuman'));
    }

    // tentang
    public function genbiPoint()
    {
        $genbiPoints = GenbiPoint::where('status', 'published')
            ->orderByRaw("FIELD(bulan, 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember')")
            ->get();

        return view('home.tentang.genbiPoint', compact('genbiPoints'));
    }


    public function strukturOrganisasi()
    {
        $organisasi = Cache::rememberForever('struktur_organisasi', function () {
            return Organisasi::with([
                'divisi.pengurusDivisi',
                'divisi.anggota',
                'pengurusHarian'
            ])->first();
        });

        return view('home.tentang.strukturOrganisasi', [
            'organisasi' => $organisasi
        ]);
    }

    public function tentangGenbi()
    {
        return view('home.tentang.tentangGenbi');
    }
}
