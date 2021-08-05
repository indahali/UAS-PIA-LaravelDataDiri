<?php
use App\Http\Controllers\contactController;
use App\Http\Controllers\pendidikanController;
use App\Http\Controllers\pengalamanController;
use App\Http\Controllers\profilController;
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
Route::get('/beranda', function () {
    return view('beranda');
});
route::get('', [contactController::class, "index"]);
route::get('', [pendidikanController::class, "index"]);
route::get('', [profilController::class, "index"]);
//route::get('/customers', [contactController::class, "index"]);
//route::get('/customers/create', [contactController::class, "create"]);
//route::post('/customers', [contactController::class, "store"]);
//route::get('/customers/{id}', [contactController::class, "show"]);
//route::get('/customers/{id}/edit', [contactController::class, "edit"]);
//route::put('/customers/{id}', [contactController::class, "update"]);
//Route::delete('/customers/{id}', [contactController::class, 'destroy']);
route::resource('contacts', contactController::class);
route::resource('profils', profilController::class);
route::resource('pendidikans', pendidikanController::class);
route::resource('pengalamans', pengalamanController::class);