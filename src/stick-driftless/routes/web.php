<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomizeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PlayStationController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\SwitchController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\XboxController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/catalogue', [CatalogueController::class, 'index'])->name('catalogue');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/customize', [CustomizeController::class, 'index'])->name('customize');
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::match(['post', 'put'], '/inventory/update', [InventoryController::class, 'update'])->name('inventory.update');
Route::post('/inventory/add', [InventoryController::class, 'add'])->name('inventory.add');
Route::post('/inventory/delete', [InventoryController::class, 'delete'])->name('inventory.delete');
Route::get('/playstation', [PlayStationController::class, 'index'])->name('playstation');
Route::get('/product-details', [ProductDetailsController::class, 'index'])->name('product-details');
Route::get('/product-details/{id}', [ProductDetailsController::class, 'index'])->name('product-details.show');
Route::get('/results', [ResultsController::class, 'index'])->name('results');
Route::get('/retro', [RetroController::class, 'index'])->name('retro');
Route::get('/switch', [SwitchController::class, 'index'])->name('switch');
Route::get('/update', [UpdateController::class, 'index'])->name('update');
Route::get('/xbox', [XboxController::class, 'index'])->name('xbox');