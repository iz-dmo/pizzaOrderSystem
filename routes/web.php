<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;





//login register
Route::redirect('/','loginPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function(){
    
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
   
    //admin part

    Route::group(['prefix'=>'category','middleware'=>'admin_auth'],function(){
        Route::get('list',[CategoryController::class,'categoryList'])->name('admin#categoryPage');
    });

    //user part

    Route::group(['prefix'=>'user'],function(){
        Route::get('home',function(){
            return view('user.home');
        })->name('user#home');
    });
    
});
