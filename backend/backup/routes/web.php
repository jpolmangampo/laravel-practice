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
})->name('welcome');



Route::get('/hello', function () {
    return "Hello";
});

Route::get('/hello/world', function() {
    return "hello world!";    
});

Route::get('/hello/{name}', function($name){
    return $name;
});

Route::get('/hello/{name}/{address}', function($name, $address){
    return "Hello $name from $address";
});

Route::get('/welcome', function(){
    return redirect()->route('welcome');
});

// Route::post() - Save/create database record
// Route::patch() - updating/editing database record
// Route::delete() - deleting database record

Route::get('/post', [PostController::class, 'index'])->name('post');

Route::get('/post/{user}', [PostController::class, 'viewPost']);