<?php

namespace App\Http\Controllers\Beasiswa_bi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangBiController extends Controller
{
    public function index()
    {
        return view('beasiswa_bi.tentangBi');
    }
}
