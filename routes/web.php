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

Route::get('/', [UserController::class , 'index']);
Route::get('/register', [UserController::class , 'register']);
Route::post('/register', [UserController::class , 'store']);
Route::get('/login', [UserController::class , 'login']);
Route::post('/login', [UserController::class , 'check']);
Route::get('/logout', [UserController::class , 'logout']);

Route::get('/main', [MainController::class , 'index']);
Route::get('/create', [MainController::class , 'create']);
Route::post('/store', [MainController::class , 'store']);

Route::post('/edit', [MainController::class , 'edit'])->middleware('edit.check');
Route::get('/update/{id}', [MainController::class , 'update']);

Route::get('/delete/{id}', [MainController::class , 'delete']);

Route::get('/export', [MainController::class , 'export']);
Route::get('/search', [MainController::class , 'search']);

Route::post('/update_User/{id}', [UserModiffyController::class , 'User_uodate']);
Route::post('/user_delete/{id}', [UserModiffyController::class , 'user_delete']);

Route::get('/test', [MainController::class , 'test']);



