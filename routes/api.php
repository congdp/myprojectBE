<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [UserController::class,'login']);
    Route::post('signup', [UserController::class,'signup']);

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [UserController::class,'logout']);
        Route::get('user', [UserController::class,'user']);
    });
});
Route::resource('product', "ProductController");

Route::resource('order', "OrderController");


Route::get('category',[CategoryController::class,'index']);
Route::get('category/{id}', [CategoryController::class,'show']);
Route::post('category', [CategoryController::class,'store']);
Route::put('category/{id}', [CategoryController::class,'update']);
Route::delete('category/{id}', [CategoryController::class,'delete']);
Route::get('categories', [CategoryController::class,'search']);



Route::get('all-user', [UserController::class,'getAllUser']);
Route::get('search', [UserController::class,'searchUser']);
Route::get('user/{id}',[UserController::class,'show']);
Route::put('user/{id}',[UserController::class,'update']);

