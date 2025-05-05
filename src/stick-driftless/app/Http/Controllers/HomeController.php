<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $gamepads = \App\Models\Gamepad::take(3)->get(); // Get the first three gamepads
    return view('home', compact('gamepads'));
}
}