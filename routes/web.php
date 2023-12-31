<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\ConfirmadoController;
use App\Http\Controllers\WebScraperController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/estados/getEstados', [EstadoController::class, 'getEstados']);
Route::resource('/estados',EstadoController::class);
Route::resource('/confirmados',ConfirmadoController::class);

Route::get('/scrape-website', [WebScraperController::class, 'login2']);

