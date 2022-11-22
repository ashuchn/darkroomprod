<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    
    public function dashboard()
    {
        return
        
        view('dashboard');
    }


    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' =>'required|email|exists:admin',
            'password' =>'required'
        ], [
            'required' =>':attribute is required',
            'email.exists' =>':attribute does not exist',
        ]);
        if($validator->fails())
        {
            return back()->withErrors($validator)->withInput();
        }

        $checkEmail = DB::table('admin')->where(['email'=>$request->email])->first();
        if( !$checkEmail || !Hash::check($request->password , $checkEmail->password)) {
            return back()->with('err_msg', 'Invalid Email or Password');
        } else {
            session()->put('adminId', $checkEmail->id);
            
            DB::table('admin')->update([
               "last_login_at" => date("Y-m-d H:i:s") 
            ]);

            return redirect()->route('admin.dashboard');
        }

    }


    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }
}
