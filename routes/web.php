<?php

use Illuminate\Support\Facades\Route;
use App\Http\ControllersIndexController;
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
/*
Route::get('/', [IndexController::class,'index']);
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/diary', function () {
    return view('diary');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/plants', function () {
    return view('plants');
});
