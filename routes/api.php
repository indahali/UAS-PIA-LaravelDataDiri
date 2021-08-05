<?php

use App\Http\Controllers\Api\transaksicontroller;
use App\Http\Controllers\Api\notecontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', [transaksicontroller::class, 'index']);
Route::resources([
    'transactions' => transaksicontroller::class,
    'notes' => notecontroller::class,
]);
