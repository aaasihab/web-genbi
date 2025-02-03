<?php

namespace App\Http\Controllers\Tentang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenbiPointController extends Controller
{
    public function index()
    {
        return view('tentang.genbiPoint');
    }
}
