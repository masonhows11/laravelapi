<?php

use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

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
//  Route::post('/user/create',[AuthController::class,'register']);
//
//  Route::post('/user/login',[AuthController::class,'login']);

////////////// public product routes
//  Route::get('/products', [ProductController::class, 'index']);
//
//  Route::get('/show/{id}', [ProductController::class, 'show']);
//
//  Route::get('/search/{slug}',[ProductController::class,'search']);

////////////// protected routes
//  Route::middleware(['auth:sanctum'])->group(function () {
//
//    Route::post('/store', [ProductController::class, 'store']);
//
//    Route::post('/update/{id}',[ProductController::class,'update']);
//
//    Route::get('/destroy/{id}',[ProductController::class,'destroy']);
//
//    Route::get('/user/logout',[AuthController::class,'logOut']);
//
//  });

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

// product routes
Route::get('/products',[ProductController::class,'index'])->name('get.products');
Route::get('/product/{$id}',[ProductController::class,'show'])->name('get.product');

Route::get('/product/feature',[ProductController::class,'feature'])->name('get.product.features');
Route::get('/product/sponsor',[ProductController::class,'sponsor'])->name('get.product.sponsor');
// comment routes
Route::get('/comments/{$product_id}',[CommentController::class,'index'])->name('get.product.comments');
Route::post('/comment/{$product_id}',[CommentController::class,'store'])->name('add.product.comments');
