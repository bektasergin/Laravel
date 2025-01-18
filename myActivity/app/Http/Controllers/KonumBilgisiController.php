<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonumBilgisiController extends Controller
{
    public function index()
    {
        return view('konum');
    }
}
