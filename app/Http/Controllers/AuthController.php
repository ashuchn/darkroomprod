<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use Hash;
use Session;
use DB;
use Storage;

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
            toastr()->error($validator->errors()->first(), 'Oops!');
            return redirect()->back();
        }
        $image = $request->file('pfp');
        $path = Storage::disk('s3')->put('images', $request->file('pfp'));
        $url = Storage::disk('s3')->url($path);

        

        DB::table('admin')->where('id', session()->get('adminId'))->update([
            "profile_pic" => $url
        ]);

  
        toastr()->error('Profile Pic Changed', 'Ok!');
        return redirect()->route('admin.profile'); 

    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "current_password" => 'required',
            "password" => "required|min:5|required_with:password_confirmation",
            "password_confirmation" => "required|min:5|same:password"
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $currentPassword = Admin::where('id', session('adminId'))->pluck('password'); 
        
        if (Hash::check($request->password, $currentPassword[0])) {
            return back()->with('error','Current Password and New Password should be different');
        } else {
            DB::table('admin')->where('id', session()->get('adminId'))
            ->update([
                "password" => Hash::make($request->password)
            ]);
            return back()->with('success','Password Changed');
        }




    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('admin.login');
    }
}
