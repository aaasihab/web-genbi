<?php

namespace App\Http\Controllers\Tentang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        return view('tentang.struktur');
    }
}
