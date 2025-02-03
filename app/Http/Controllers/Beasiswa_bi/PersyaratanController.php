<?php

namespace App\Http\Controllers\Beasiswa_bi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function index()
    {
        return view('beasiswa_bi.persyaratan');
    }
}
