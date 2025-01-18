<?php

namespace App\Models;

use App\Models\Location;
use App\Controller\LocationController;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('map', compact('locations'));
    }
}

