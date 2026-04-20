<?php

use App\Http\Controllers\AttractionController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // Dashboard & Profile
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pages
    Route::get("/master", function () {
        return view('pages.home');
    });
    Route::get("/about", function () {
        return view("pages.about");
    });
    Route::get("/destinasi", function () {
        $destinasi = [
            "nama" => "Bali",
            "harga" => 5000000,
            "durasi" => "4 hari 3 malam",
            "transportasi" => "pesawat",
            "hotel" => "bintang 4",
            "rating" => 4.8,
            "fasilitas" => ["Hotel","sarapan","Tour Guide", "spa", "wifi gratis", "transport lokal"],
        ];
        return view("pages.destinasi", compact('destinasi'));
    });

    // Resources
    Route::resource("destinations", DestinationController::class);
    Route::resource("users", UserController::class);
    Route::resource("attractions", AttractionController::class);
    Route::resource("reviews", ReviewController::class);
});

require __DIR__.'/auth.php';
