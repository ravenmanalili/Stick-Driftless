<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayStationController extends Controller
{
    public function index()
    {
        return view('playstation');
    }
}
