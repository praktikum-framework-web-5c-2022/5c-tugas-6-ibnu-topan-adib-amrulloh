<?php

use App\Models\Tumbuhan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TumbuhanController;
use App\Http\Controllers\TumbuhansController;

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

Route::get('/', [TumbuhanController::class,'index']);


Route::resource('/tumbuhans',TumbuhanController::class);

