<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    public function showCustom(){
        return view('custom.customize');
    }

    public function uploadImg(Request $request){
        $pages = Pages::find(1);

        if($request->file())
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/homepage', $filename);
            $pages->main_image = "storage/homepage/".$filename;
        }

    }

}
