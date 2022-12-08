<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Home\HomeController;

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
    return view('home.index');
});

Route::get('/get-users',
    [HomeController::class, 'getUsers'])
    ->name('home.getUsers');

Route::post('/storeFile',
    [HomeController::class, 'uploadImages'])
    ->name('home.uploadFiles');
