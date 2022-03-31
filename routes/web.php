<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GuestController::class, "index"])->name("home");

Route::get("/gallery", [GuestController::class, "gallery"])->name("gallery");

Route::group(["prefix"=> "dashboard", "middleware" => "auth"], function() {
    Route::get("/", function() {
        return redirect()->to(route("admins.index"));
    })->name("dashboard");
    Route::resource("admins", AdminController::class);
    Route::resource("gallery", GalleryController::class);
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
