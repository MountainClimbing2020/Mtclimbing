<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;


class ImageController extends Controller{
    public function upload(Request $request){
        $image=$request->file('image');
        if($image) {
            //アップロードされた画像を保存する
            $path = $image->store('uploads',"public");
        }
        return view("memory/confirm", compact('image'));
    }
    public function complete(Request $request){
        if($image) {
            //画像の保存に成功したらDBに記録する
            if($path){
                Image::create([
                    "file_name" => $image->getClientOriginalName(),
                ]);
            }
        }
        return view("memory/complete");
        }



}