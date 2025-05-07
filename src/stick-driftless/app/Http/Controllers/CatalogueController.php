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
        $platform = $request->input('gamepad_platform');

        $gamepads = Gamepad::where('status', 1)
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQ) use ($query) {
                    $subQ->where('gamepad_name', 'like', "%{$query}%")
                        ->orWhere('gamepad_description', 'like', "%{$query}%");
                });
            })
            ->when($platform, function ($q) use ($platform) {
                $q->where('platform', $platform);
            })
            ->get();

        return view('catalogue', compact('gamepads', 'query', 'platform'));
    }

}
