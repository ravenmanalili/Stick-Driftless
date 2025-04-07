<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gamepad;

class CatalogueController extends Controller
{
    public function index()
    {
    $gamepads = Gamepad::all();
    return view('catalogue', compact('gamepads'));
    }
}
