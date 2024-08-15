<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookController;
use App\Models\Keranjang;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::put('/updateUser', [AuthController::class, 'updateUser']);

Route::get('/readimg/{img}', function ($img) {
    $url = storage_path('app/public/img') . '/' . $img;
    $foto = file_get_contents($url);
    return response($foto, 200)->header('Content_Type', 'image/jpeg');
});

Route::get('/tabs/tab1', [BookController::class, 'index']);
Route::get('/readimgbuku/{img}', function ($img) {
    $url = storage_path('app/public/buku_img') . '/' . $img;
    $foto = file_get_contents($url);
    return response($foto, 200)->header('Content_Type', 'image/jpeg');
});
Route::get('/tabs/detail/{id}', [BookController::class, 'detailBuku']);
Route::get('/tabs/tab2/keranjang', [BookController::class, 'cart']);
Route::get('/tabs/badge', [BookController::class, 'badge']);
Route::post('/buku/keranjang', [BookController::class, 'addtocart']);
Route::post('/tabs/tab2/keranjang/delete', [BookController::class, 'hapusCart']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
