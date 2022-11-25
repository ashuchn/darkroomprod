<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Photos;
use Validator;
use Hash;
use Session;
use DB;
use Storage;


class PhotosController extends Controller
{

    public function singleUpload()
    {
        return view('photos.single_upload');
    }

    public function singleUploadPost(Request $request)
    {
        // $image = $request->file('file');
        $path = Storage::disk('s3')->put('images', $request->file('file'));
        $url = Storage::disk('s3')->url($path);
        
        $insert = new Photos;
        $insert->image_path = $url;
        $insert->save();
            
        return response()->json(['success'=>$url]);
    }

    public function allPhotos()
    {
        return view('photos.allPhotos', ['data' =>  Photos::all()]);
    }

}
