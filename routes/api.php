<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

////////////// public routes
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
