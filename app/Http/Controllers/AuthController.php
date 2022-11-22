<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
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

    public function profile()
    {
        $adminId = session()->get('adminId');
        $data = Admin::find($adminId);
        
        return view('auth.profile', ['data' => $data]);
    }

    public function changePfp(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'pfp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()) {
            // return back()->withErrors($validator);
            toastr()->error($validator->errors()->first(), 'Oops!');
            return redirect()->back();
        }
        $image = $request->file('pfp');
        $imageName = rand(1,999).'-'.time() . '.' . $image->getClientOriginalExtension();
        // $imageName = rand(1,999).'-'.time().'.'.$request->image->extension();
        $destination = public_path('/images');
        $image->move($destination, $imageName);
        $baseurl = url('/');
        $path = $baseurl . "/images/" . $imageName;

        DB::table('admin')->where('id', session()->get('adminId'))->update([
            "profile_pic" => $path
        ]);

  
        toastr()->error('Profile Pic Changed', 'Ok!');
        return redirect()->route('admin.profile'); 

    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }
}
