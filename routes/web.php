<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;





//login register
Route::redirect('/','loginPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');


Route::middleware(['auth'])->group(function(){
    
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
   
    //admin part

    Route::group(['prefix'=>'backend','middleware'=>'admin_auth'],function(){
        Route::get('/',[CategoryController::class,'home'])->name('admin#home');
        // backend category section
        Route::get('list',[CategoryController::class,'categoryList'])->name('admin#categoryPage');
        Route::get('create/CategoryPage',[CategoryController::class,'categoryPage'])->name('admin#createCategory');
        Route::post('create',[CategoryController::class,'create'])->name('createCategory');
        Route::get('delete/{id}',[CategoryController::class,'destory'])->name('deleteCategory');
        Route::get('edit/{id}',[CategoryController::class,'editCategory'])->name('edit#Category');
        Route::post('store/{id}',[CategoryController::class,'updateCategory'])->name('store#Category');

        // change password
        Route::get('change/Password',[AdminController::class,'changepassword'])->name('admin#changePassword');
        Route::post('ChangedPassword',[AdminController::class,'changed'])->name('admin#changedPassword');

        //account / user info
        Route::get('user/Detail',[AdminController::class,'detail'])->name('admin#account');
        Route::get('user/edit',[AdminController::class,'editDetail'])->name('admin#edit');
        Route::post('user/changedDetail/{id}',[AdminController::class,'changedDetail'])->name('admin#changedDetail');
        
    });

    //user part

    Route::group(['prefix'=>'frontend'],function(){
        Route::get('home',function(){
            return view('user.home');
        })->name('user#home');
    });
    
});
