<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

// Route::group(['middleware' => ['auth:api']], function () {
//     Route::get('/me', 'AuthController@me');
//     Route::post('/post', 'PostController@store');
// });

// Route::get('/posts', 'PostController@index');
// Route::get('/posts/top-five', 'PostController@indexTopFive');
// Route::get('/posts/{post}', 'PostController@show');

// Route::get('/comments', 'CommentController@index');
// // Route::post('/posts/{post}/comment', 'CommentController@store');
// Route::post('/articles/{article}/comment', 'CommentController@store');


// Route::get('/articles', 'ArticleController@index');
// Route::get('/article', 'ArticleController@show');
// Route::patch('/article', 'ArticleController@update');
// Route::delete('/article', 'ArticleController@destroy');