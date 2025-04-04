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
        // You can add database queries here to fetch any data needed for the home page
        // For example:
        // $featuredProducts = DB::table('products')->where('featured', true)->get();
        
        return view('home');
    }
}