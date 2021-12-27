<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

Route::get("/login", [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post("/login", [AuthController::class, 'authenticate']);
Route::post("/logout", [AuthController::class, 'logout']);

Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'storeRegister']);

Route::get("/", [AuthController::class, 'home']);
// Route::resource('post', PostController::class)->middleware('auth');
Route::resource('post', PostController::class)->middleware('admin'); //custom midleware
