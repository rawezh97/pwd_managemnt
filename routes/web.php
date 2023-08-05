<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserModiffyController;
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


Route::get('/', [MainController::class , 'index']);
Route::get('/start', [MainController::class , 'start']);
Route::get('/create', [MainController::class , 'create']);



