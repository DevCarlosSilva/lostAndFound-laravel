<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// test

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::resource('items', ItemsController::class);
Route::resource('reports', ReportsController::class);
Route::get('/adminPanel', [AdminPanelController::class, 'index'])->name('adminPanel');
Route::resource('categories', CategoriesController::class);
Route::resource('locations', LocationsController::class);
