<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class , 'index']);
Route::get('/register', [UserController::class , 'register']);
Route::post('/register', [UserController::class , 'store']);
Route::get('/login', [UserController::class , 'login']);
Route::post('/login', [UserController::class , 'check']);
Route::get('/logout', [UserController::class , 'logout']);

Route::get('/main', [MainController::class , 'index']);
Route::get('/create', [MainController::class , 'create']);
Route::post('/store', [MainController::class , 'store']);






