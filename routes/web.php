<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenjagaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\DatapinjamController;

use App\Models\Buku;

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
    return view('LandingPage');
});

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku_pasif', [BukuController::class, 'index_pasif']);
Route::get('/buku/create', [BukuController::class, 'create']);
Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
Route::get('buku/detail/{id}', [BukuController::class, 'detail']);
Route::post('/buku/save', [BukuController::class, 'store']);
Route::delete('/buku', [BukuController::class, 'destroy']);
Route::put('/buku/{id}', [BukuController::class, 'update']);



Route::get('member', [MemberController::class, 'index']);
Route::get('member_pasif', [MemberController::class, 'index_pasif']);
Route::get('member/create', [MemberController::class, 'create']);
Route::get('member/detail/{id}', [MemberController::class, 'detail']);
Route::post('member/save', [MemberController::class, 'store']);
Route::delete('member', [MemberController::class, 'destroy']);



Route::get('penjaga', [PenjagaController::class, 'index']);


Route::get('pinjam', [PinjamController::class, 'index']);
Route::post('pinjam/save', [PinjamController::class, 'store']);

Route::get('datapinjam', [DatapinjamController::class, 'index']);
Route::delete('datapinjam', [DatapinjamController::class, 'destroy']);

Route::get('profile/settings', [ProfileController::class, 'index']);

Route::get('search', [PinjamController::class, 'search']);
Route::get('searchm', [PinjamController::class, 'searchm']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
