<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\SkijeContoller;
use App\Http\Controllers\UserContoller;
use App\Http\Controllers\UserSkijeController;
use App\Http\Controllers\TypeSkijeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/skije', [SkijeContoller::class, 'index']);
// Route::get('/skije/{id}', [SkijeContoller::class, 'show']);


Route::get('/users', [UserContoller::class, 'index']);
Route::get('/users/{id}', [UserContoller::class, 'show']);



Route::get('/users/{id}/skije', [UserSkijeController::class, 'index'])->name('users.skije.index');

Route::get('/types/{id}/skije', [TypeSkijeController::class, 'index'])->name('types.skije.index');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route:: group(['middleware'=>['auth:sanctum']],function(){
    Route::get('/profile', function(Request $request){
        return auth()->user();
    });

    Route::resource('skije', SkijeContoller::class)->only(['update','store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::resource('skije', SkijeContoller::class)->only(['index']);