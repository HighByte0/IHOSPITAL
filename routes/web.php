<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

//page li par default
Route::get('/', [HomeController::class,'index']) ;

//page dyl adminet user 3la hsab typuser->look the database
Route::get('/home', [HomeController::class,'redirect'])->middleware('auth','verified') ;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//tzid doctor
Route::get('/add_doctor_view', [AdminController::class,'addview']) ;
//ndiw data l data base
Route::post('/upload_doctor', [AdminController::class,'upload']) ;

//rondivo
Route::post('/appointment', [HomeController::class,'appointment']) ;
//chof les rondivo dyawlk
Route::get('/my_appointemnet', [HomeController::class,'myappointemnet']) ;
//thyd chi rondivo show_appoint
Route::get('/cancel_appoint/{id}', [HomeController::class,'cancel_appoint']) ;

//rondivowat li 3nd latiba

Route::get('/show_appoint', [AdminController::class,'show_appoint']) ;

//confirm dyl rondivo hh

Route::get('/approved/{id}', [AdminController::class,'approved']) ;
//anuller le rondivoo hh
Route::get('/cancel/{id}', [AdminController::class,'cancel']) ;
//show doctor
Route::get('/showdr', [AdminController::class,'showdr']) ;
//doctor resign to_resign

Route::get('/to_resign/{id}', [AdminController::class,'to_resign']) ;

//update info of doctor updt_doctor
Route::get('/to_update/{id}', [AdminController::class,'to_update']) ;
//send the update to database
Route::POST('/updt_doctor/{id}', [AdminController::class,'to_submit']) ;
//send reponse for the patient via email  
Route::GET('/emailview/{id}', [AdminController::class,'emailview']) ;

Route::POST('/sendemail/{id}', [AdminController::class,'sendemail']) ;
