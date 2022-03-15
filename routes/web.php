<?php

use App\Http\Controllers\DalykaiController;
use App\Http\Controllers\DestytojaiController;
use App\Http\Controllers\GrupesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatalposController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SarasasController;
use App\Http\Controllers\TvarkarastisController;
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
Auth::routes();
Route::middleware(['AdminAccess'])->group(function () {
    Route::controller(DestytojaiController::class)->group(function () {
        Route::get('prideti/destytoja', 'create');
        Route::post('destytojas/pridetas', 'store');
        Route::get('destytojas/{dest:slug}', 'show')->name('dest.show');
    });
    Route::controller(DalykaiController::class)->group(function () {
        Route::get('prideti/dalyka', 'create');
        Route::post('dalykas/pridetas', 'store');
    });
    Route::controller(GrupesController::class)->group(function () {
        Route::get('prideti/grupe', 'create');
        Route::post('grupe/prideta', 'store');
    });
    Route::controller(PatalposController::class)->group(function () {
        Route::get('prideti/patalpas', 'create');
        Route::post('patalpos/pridetos', 'store');
    });
    Route::controller(TvarkarastisController::class)->group(function () {
        Route::put('/tvarkarastis/prideti', 'store')->name('tvark.prideti');
        Route::get("tvarkarastis/redaguoti/{id}", 'edit');
        Route::post('tvarkarastis/suredaguotas', 'update')->name('tvark.update');
        Route::get('tvarkarastis/sunaikinti/{id}', 'destroy')->name('tvark.destroy');
    });
});
// Route::get("/destytojas/");

Route::get('/grupes', [GrupesController::class, 'show'])->name('grupiu.sarasas');
Route::get("/grupes/{id}", [GrupesController::class, 'grupid']);;

Route::put('/pdf-gen/', [PDFController::class, 'generuoti'])->name('pdf.pdf');

Route::get('/sarasas', [SarasasController::class, 'index'])->name('sss');


Route::get('/home', [HomeController::class, 'dalyk'])->name('home');
