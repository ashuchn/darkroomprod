<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use App\Models\Admin;

class ApiController extends Controller
{
    public function test()
    {

        $data = Admin::get(['id','name','email','profile_pic']);

         return response()->json([
            "message" => "Ok",
            "code" => 200,
            "data" => $data
        ]);
    }
}
