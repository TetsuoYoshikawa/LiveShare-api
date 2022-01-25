<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SharesController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\WantsController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/profile/{user_id}', [UserController::class, 'getProfile']);
Route::put('/profile/user/{id}', [UserController::class, 'putProfile']);
Route::post('/profile', [UserController::class, 'putImage']);

Route::get('/share', [SharesController::class, 'get']);
Route::post('/share', [SharesController::class, 'post']);
Route::post('/shares', [SharesController::class, 'postShare']);
Route::get('/share/{share}', [SharesController::class, 'show']);

Route::get('/share/user/{user_id}', [SharesController::class, 'getShare']);
Route::delete('/share/{share}', [SharesController::class, 'delete']);

Route::get('/favorite/{user_id}', [FavoritesController::class, 'get']);
Route::post('/favorite', [FavoritesController::class, 'post']);
Route::delete('/favorite', [FavoritesController::class, 'delete']);

Route::get('/want/share/{share_id}', [WantsController::class, 'getUser']);
Route::get('/want/user/ {user_id}', [WantsController::class, 'get']);
Route::post('/want', [WantsController::class, 'post']);
Route::delete('/want', [WantsController::class, 'delete']);

Route::get('/comment/{share_id}', [CommentsController::class, 'get']);
Route::post('/comment', [CommentsController::class, 'post']);
Route::delete('/comment', [CommentsController::class, 'delete']);
