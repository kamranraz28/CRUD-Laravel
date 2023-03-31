<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Crudcontroller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/',[Crudcontroller::class,'showdata']);
Route::get('/add-data',[Crudcontroller::class,'adddata']);
Route::post('/store-data',[Crudcontroller::class,'storedata']);
Route::get('/edit-data/{id}',[Crudcontroller::class,'editdata']);
Route::post('/update-data/{id}',[Crudcontroller::class,'updatedata']);
Route::get('/delete-data/{id}',[Crudcontroller::class,'deletedata']);
