<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\novel;
use App\Http\Controllers\cekResi;
use App\Http\Controllers\apiCoronaController;

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

Route::get('/index',[cekResi::class, 'index'])->name('index');
Route::get('/api/corona',[apiCoronaController::class, 'index'])->name('apiCorona');
