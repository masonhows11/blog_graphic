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
        $like->sample_id = $request->sampleId;
        $like->user_id = $request->userId;
        $like->like = $is_like;
        $like->save();
        return response()->json(['status'=>200]);
       // return redirect()->back();

    }
}
