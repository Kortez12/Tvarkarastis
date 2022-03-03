<?php

use App\Http\Controllers\DalykaiController;
use App\Http\Controllers\DestytojaiController;
use App\Http\Controllers\GrupesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatalposController;
use App\Http\Controllers\SarasasController;
use App\Http\Controllers\TvarkarastisController;
use App\Http\Controllers\WelController;
use App\Models\Grupes;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin', function () {
    return view('admin');
});

Route::middleware(['AdminAccess'])->group(function () {
Route::controller(DestytojaiController::class)->group(function () {
    Route::get('prideti/destytoja', 'create');
    Route::post('destytojas/pridetas', 'store');
});
Route::controller(DalykaiController::class)->group(function () {
    Route::get('prideti/dalyka', 'create');
    Route::post('dalykas/pridetas', 'store');
});
Route::controller(GrupesController::class)->group(function () {
    Route::get('prideti/grupe', 'create');
    Route::post('grupe/prideta', 'store');
    Route::get('/grupess', 'show');
    Route::get('/grupess/{id}', 'grupid');
});
Route::controller(PatalposController::class)->group(function () {
    Route::get('prideti/patalpas', 'create');
    Route::post('patalpos/pridetos', 'store');
});
});

// Route::put('/tvarkarastis', [TvarkarastisController::class, 'store'])->name('tvark.prideti');

Route::controller(TvarkarastisController::class)->group(function () {
    Route::get('/tvark', 'index')->name('tvark.index');
    Route::put('/tvarkarastis/prideti', 'store')->name('tvark.prideti');
});


Route::get('/sarasas', [SarasasController::class, 'index']);
Auth::routes();

// Route::get('/welcome', [WelController::class, 'dalyk']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'dalyk'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
