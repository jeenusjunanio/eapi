<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

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

// The below route gives all the facility of crud operation
Route::Resource('products',ProductController::class);

Route::group(['prefix'=>'products'],function(){
    Route::Resource('{product}/reviews',ReviewController::class);
});
//Route::Resource('reviews',ReviewController::class);

// The below route removes the create and edit routes for the api
//Route::apiResource('products',ProductController::class);
