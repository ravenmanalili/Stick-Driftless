<?php

namespace App\Http\Controllers;
use App\Models\Gamepad;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $gamepads = Gamepad::all();
        return view('inventory', compact('gamepads'));
    }
}
