<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gamepad;

class CatalogueController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $gamepads = Gamepad::where('status', 1)
                ->where(function ($q) use ($query) {
                    $q->where('gamepad_name', 'like', "%{$query}%")
                      ->orWhere('gamepad_description', 'like', "%{$query}%");
                })
                ->get();
        } else {
            $gamepads = Gamepad::where('status', 1)->get();
        }

        return view('catalogue', compact('gamepads', 'query'));
    }

}
