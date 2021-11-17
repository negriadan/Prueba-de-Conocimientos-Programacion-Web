<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;//para acceder a la clase

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
    return view('auth.login');
});

/*
//otras formas de acceder
 
Route::get('/cliente', function () {
    return view('cliente.index');
});
Route::get('/cliente/create', [ClienteController::class,'create']);
*/

//accede a todas las urls
Route::resource('cliente',ClienteController::class)->middleware('auth');
Auth::routes(['reset'=>false]);

Route::get('/home', [ClienteController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'],function () {
    Route::get('/', [ClienteController::class, 'index'])->name('home');
});