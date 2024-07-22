<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index($id)
    {

        return response()->json(['message' => '200','data' =>  Comment::where('product_id',$id)->get()],200);
    }

    public function store($id,Request $request)
    {
        // return $request;
        //        $comment = Comment::create([
        //            'name' => 'test',
        //            'email' => 'mason.hows11@gmail.com',
        //            'avatar' => 'test',
        //            'score' => '3',
        //            'product_id' => $id
        //        ]);
        $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $request->avatar,
            'score' => $request->score,
            'product_id' => $id
        ]);
        return response()->json(['message' => '200','data' =>  $comment],200);
    }
}
