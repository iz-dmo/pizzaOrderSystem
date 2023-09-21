<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;

class AdminController extends Controller
{

    

    //change password
    public function changepassword(){
        return view('admin.account.password');
    }

    public function changed(ChangePasswordRequest $request){
        $user=User::select('password')->where('id',Auth::user()->id)->first();
        $dbHashValue=$user->password;
        if(Hash::check($request->currentPassword,$dbHashValue)){
            User::where('id',Auth::user()->id)->update([
                'password'=>Hash::make($request->newPassword)
            ]);

            Auth::logout();
            return redirect()->route('auth#loginPage');
        }
            return back()->with([
                'notMatch'=>'current password is invalid,Please try again!'
            ]);
        
    }

    //user info section
    public function detail(){
        return view('admin.account.detail');
    }

    public function editDetail(){
        return view('admin.account.edit');
    }

    public function changedDetail($id,AdminUpdateRequest $request){
        $user=User::find($id);
        $user->update($request->all());
        if($request->hasFile('newImage')){
            $fileName=time().'.'.$request->newImage->extension();
            $upload=$request->newImage->move(public_path('images/'),$fileName);

            if($upload){
                $user->image="/images/".$fileName;
            }
        }else{
                $user->image="";
        }
        $user->save();
        return redirect()->route('admin#account');
    }
}
