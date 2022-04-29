<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuth;

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
Route::get('/login',[CustomAuth::class,'login'])->middleware('alreadyLoggedIn');;
Route::get('/signup',[CustomAuth::class,'signup'])->middleware('alreadyLoggedIn');;
Route::post('/registerUser',[CustomAuth::class,'registerUser'])->name('registerUser');
Route::post('/loginUser',[CustomAuth::class,'loginUser'])->name('loginUser');
Route::get('/dashboard',[CustomAuth::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuth::class,'logout']);