<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return view('halo');
});
Route::get("/halo", function () {
    $nama = "Dahlan Syahroni Nasution";
    $hobi = ["membaca buku", "bermain game", "bersepeda"];
    return view(view: 'halo', data: compact('nama', 'hobi'));
});
Route::get('/switch', function () {
    $role = 'admin';
    return view(view: 'switch', data: compact('role'));
});
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

Route::get(
    "/destination",
    [DestinationController::class, 'index']
);
Route::get("/destinasi1/{id}", [DestinationController::class, 'show']);

Route::get("/destination/create", [DestinationController::class, 'create']);
Route::post("/destination", [DestinationController::class, 'store']);

Route::delete("/destination/create", [DestinationController::class, 'delete']);
Route::delete("/destination/{id}", [DestinationController::class, 'delete']);

Route::get("/destination/{id}/edit", [DestinationController::class, 'edit']);
Route::put("/destination/{id}/update", [DestinationController::class, 'update']);

Route::get("/user", [UserController::class, 'index']);
Route::get("/users/{id}", [UserController::class, 'show']);
Route::get("/user/create", [UserController::class, 'create']);
Route::post("/user/store", [UserController::class, 'store']);
Route::delete("/user/{id}", [UserController::class, 'delete']);
Route::get("/user/{id}/edit", [UserController::class, 'edit']);
Route::put("/user/{id}/update", [UserController::class, 'update']);

