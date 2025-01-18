<?php

namespace App\Http\Controllers;

use App\Models\etkinlikler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $etkinlikler = DB::select('SELECT * FROM etkinlikler');

        return view('index', compact('etkinlikler'));
    }
}
