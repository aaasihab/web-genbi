<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Kegiatan;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function beranda()
    {
        return view('home.beranda');
    }
    public function kegiatan()
    {
        $kegiatan = Kegiatan::where('status', 'published')
            ->orderBy('tanggal_kegiatan', 'desc')
            ->get();

        return view('home.kegiatan', compact('kegiatan'));
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
        return view('home.tentang.genbiPoint');
    }

    public function strukturOrganisasi()
    {
        return view('home.tentang.strukturOrganisasi');
    }

    public function tentangGenbi()
    {
        return view('home.tentang.tentangGenbi');
    }
}
