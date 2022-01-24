<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\FollowerController;


Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login'])->name('login');
    Route::post('/logout', [JWTController::class, 'logout']);
    /*Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
    */
    Route::prefix('facebook')->name('facebook.')->group( function(){
        Route::get('/auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
        Route::get('/callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('follower', 'App\Http\Controllers\FollowerController@follow')->name('follower');
Route::get('unfollow', 'App\Http\Controllers\FollowerController@unfollower')->name('unfollower');


