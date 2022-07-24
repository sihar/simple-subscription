<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::resource('post', PostController::class);

// Route::get('/post', function () {
//     return 'List post here';
// });

// Route::get('/post/{id}', [PostController::class, 'show']);

// Route::post('/post', function () {
//     return 'New post created successfully!';
// });

// Route::put('/post/{id}', function () {
//     return 'Post saved successfully!';
// });

// Route::delete('/post/{id}', function () {
//     return 'Post deleted successfully!';
// });