<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetroController extends Controller
{
    public function index()
    {
        return view('retro');
    }
}
