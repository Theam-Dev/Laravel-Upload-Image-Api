<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UploadController extends Controller
{
    public function store(Request $request){
        $this-> validate($request,[
            'name' => 'required',
            'image' => 'required'
        ]);
        $data = new Post;
        $data ->name = $request ->name;
        $data ->image = $request->file("image")->store('upload');
        $data->save();
        return response()->json($data);
    }
}
