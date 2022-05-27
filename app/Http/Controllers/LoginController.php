<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function doLogin(Request $request){
        // dd($request->all());

        $admin_info=$request->except('_token');

        if(Auth::attempt($admin_info)){
            return redirect()->route('admin.dashboard')->with('msg','Login Successful');
        }
        return redirect()->back()->with('msg','Invalid Credential');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('msg','Logout Successful');
    }
}
