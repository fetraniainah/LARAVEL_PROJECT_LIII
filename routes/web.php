<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
                
Route::get('/login',[AuthController::class, 'login'])->name('auth.login')->middleware('guest');
Route::get('/register',[AuthController::class, 'register'])->name('auth.register')->middleware('guest');
Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/local/{lang}',[HomeController::class,'setLang']);
Route::get('/search',[HomeController::class,'getPageSearch'])->name('getResult')->middleware('auth');
Route::post('/getResult',[HomeController::class,'postSearch'])->name('searchs')->middleware('auth');


                        //** Admin routes */

//** get Channells list and add new channell on action */
Route::get('/home',[Admin::class,'index'])->name('admin.home')->middleware('auth','rule');
//** get Channells and add movie on action */
Route::get('/add/{id}',[Admin::class,'create'])->name('admin.addVideo')->middleware('auth','rule');
Route::get('/play/{id}',[Admin::class,'show'])->name('videoPlay')->middleware('auth');



                        //** get Dashbord user on default */

Route::get('/dashbord',[HomeController::class,'home'])->name('dashbordUser')->middleware('auth','fee');
Route::get('/',[HomeController::class,'start'])->name('navigate')->middleware('auth');
Route::get('/payment/mobile',[HomeController::class,'mobile'])->name('mobile')->middleware('auth');
Route::get('/payment/card',[HomeController::class,'card'])->name('card')->middleware('auth');
Route::get('/notification',[HomeController::class,'notification'])->middleware('auth');
Route::get('/favoris',[HomeController::class,'getFavoris'])->middleware('auth');



                     /**post chaine And movie admin rule */
Route::post('/postChaine',[Admin::class,'store'])->name('postChaine');
Route::post('/postMovie', [Admin::class,'postMovie'])->name('admin.postMovie');
Route::post('/postFee',[HomeController::class,'postFees'])->name('postFees');


                            /** post Users */
Route::post('/postauth',[AuthController::class,'postLogin'])->name('auth.postlogin');
Route::post('/postRegisters',[AuthController::class, 'postRegister'])->name('postRegister');