<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.home');
});

Route::get('/{page}', function ($page) {
    $allowedPages = [
        'home' => 'pages.home.home',
        'catalogue' => 'pages.catalogue.catalogue',
        'cart' => 'pages.cart.cart',
        'customize' => 'pages.customize.customize',
        'playstation' => 'pages.customize.playstation',
        'retro' => 'pages.customize.retro',
        'switch' => 'pages.customize.switch',
        'xbox' => 'pages.customize.xbox',
        'product-details' => 'pages.product-details.product-details',
        'results' => 'pages.results.results',
        'inventory' => 'pages.inventory.inventory',
    ];

    return view($allowedPages[$page] ?? 'pages.home.home');
});
