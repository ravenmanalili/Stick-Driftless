<?php

namespace App\Http\Controllers;

use App\Models\Gamepad;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($id = null)
    {
        if ($id) {
            $gamepad = Gamepad::findOrFail($id);
        } else {
            $gamepad = Gamepad::first();
        }
        
        return view('product-details', compact('gamepad'));
    }
}