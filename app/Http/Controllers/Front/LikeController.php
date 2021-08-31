<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //

    public function updateLike(Request $request)
    {
        return $request;

        $sample_id = $request->sample_id;
        $is_like = $request['is_like'] === 'true';
        $update_like = false;

    }

    public function likeCount(Request $request)
    {

        $like_count = Like::where('sample_id',$request->sample_id)->where('like','=',1)->count();
        $like_dis_count = Like::where('sample_id',$request->sample_id)->where('like','=',0)->count();
        return response()->json(['like_count'=>$like_count,'like_dis_count'=>$like_dis_count]);
    }


}
