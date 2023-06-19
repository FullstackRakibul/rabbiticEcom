<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

use App\Http\Controllers\BlogController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('auth')->group(function(){

    // AUTHETICATE
    Route::post('/register' , [AuthController::class, 'register']);
    Route::post('/login' , [AuthController::class, 'login']);

    Route::get( '/login',function(){
        return response()->json(['message' => 'Please Login first'], 401);
    })->name('login');

    Route::middleware('auth:api')->group(function(){
        Route::post('/logout' , [AuthController::class, 'logout']);
        Route::get('/user' , [AuthController::class, 'show']);
        Route::get('/user/{id}' , [AuthController::class, 'show']);
    });

    // blog routes
    Route::get('/blogs', [BlogController::class,'index']);
    Route::post('/blog/store', [BlogController::class,'store']);
    Route::get('/blog/show/{id}', [BlogController::class,'show']);
    Route::get('/blog/delete/{id}', [BlogController::class,'destroy']);
});


//public route 


Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{id}',[CategoryController::class,'show']);

Route::get('/brands',[BrandController::class,'index']);
Route::get('/brands/{id}',[BrandController::class,'show']);

