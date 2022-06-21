<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesShowController;
use App\Http\Controllers\SeriesIndexController;

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

Route::get('series', SeriesIndexController::class);
Route::get('series/{series:slug}', SeriesShowController::class);
