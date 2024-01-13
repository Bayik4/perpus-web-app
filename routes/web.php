<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenjagaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('buku', [BukuController::class, 'index']);
Route::get('member', [MemberController::class, 'index']);
Route::get('penjaga', [PenjagaController::class, 'index']);

