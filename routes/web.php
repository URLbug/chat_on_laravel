<?php

use App\Models\Messagers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// get requests

Route::get('/', [
    \App\Http\Controllers\PusherController::class,
    'index',
]);

Route::get('/all', [
    \App\Http\Controllers\PusherController::class,
    'all',
]);

// post requests

Route::post('/', [
        \App\Http\Controllers\PusherController::class,
        'store',
    ]
);



