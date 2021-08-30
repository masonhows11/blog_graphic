<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //

    public function updateLike(Request $request)
    {
        //return $request;
        $is_like = $request['is_like'] === true;
        $like = new Like();
        $like->sample_id = $request->sample_id;
        $like->user_id = $request->user_id;
        $like->like = $is_like;
        if( $like->save())
        {
            return response()->json(['status'=>200]);
        }
        else
            return response()->json(['status'=>500]);
       // return redirect()->back();

    }
}
