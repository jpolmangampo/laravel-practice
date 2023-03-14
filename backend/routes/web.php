<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post/{username}/{post_id}', [PostController::class, 'viewUserPost']);



Route::get('/view-post/{username}/{post_id}', [PostController::class, 'viewUserPost']);

#CREATE
Route::get('/store/save', [PostController::class, 'save']);
Route::get('/store/create', [PostController::class, 'create']);

#READ
Route::get('/view-all', [PostController::class, 'viewAllPosts']);
Route::get('/show/{post_id}', [PostController::class, 'show']);
Route::get('/show-where/{x}', [PostController::class, 'showWhere']);