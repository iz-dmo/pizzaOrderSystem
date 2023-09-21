<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePasswordRequest;

class AuthController extends Controller
{
    // direct login page
    // password section
    public function loginPage(){
        return view('login');
    }

    //direct register page
    public function registerPage(){
        return view('register');
    }

    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#home');
        }else{
            return redirect()->route('user#home');
        }
    }

}
