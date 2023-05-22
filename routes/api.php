<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\BlogController; 

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
    Route::post('/register' , [AuthController::class, 'register']);
    Route::post('/login' , [AuthController::class, 'login']);
    
    // blog routes
    Route::get('/blog', [BlogController::class,'index']);
    Route::post('/blog/store', [BlogController::class,'store']);
    Route::get('/blog/show/{id}', [BlogController::class,'show']);
    Route::get('/blog/delete/{id}', [BlogController::class,'destroy']);


    // Route::get( '/login',function(){
    //     return response()->json([
    //         'status' => 'failed',
    //         'message' => 'Please Login first',
    //         ], 401);
    // })->name('login');

    Route::middleware('auth:api')->group(function(){
        Route::post('/logout' , [AuthController::class, 'logout']);
        Route::get('/user/{id}' , [AuthController::class, 'show']);


        

        

    });
});
