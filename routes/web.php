<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControler;
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

Route::get('/triangulo', function () {

    $altura = 4;
    $base = 3;

    $area = ($base*$altura)/2;
    return $area;
});

//No olvidarse que asi se llaman los metodos en laravel 8
//Route::get('/plantilla', [UserControler::class,'home']);
Route::get('/user', [UserControler::class,'get_users']);

Route::get('/get_user',[UserControler::class,'obtener_usuario'] );
Route::post('/save', [UserControler::class,'save']);


