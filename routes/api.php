<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

////////////// public user routes
Route::post('/user/create',[AuthController::class,'register']);

Route::get('/user/login',[AuthController::class,'login']);

////////////// public product routes
Route::get('/products', [ProductController::class, 'index']);

Route::get('/show/{id}', [ProductController::class, 'show']);

Route::get('/search/{slug}',[ProductController::class,'search']);

////////////// protected routes
Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('/store', [ProductController::class, 'store']);

    Route::post('/update/{id}',[ProductController::class,'update']);

    Route::get('/destroy/{id}',[ProductController::class,'destroy']);

});

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
