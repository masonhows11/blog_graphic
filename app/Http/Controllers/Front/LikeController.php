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
         //return $request;

        $sample_id = $request->sample_id;
        $is_like = $request['is_like']=== 'true';
        //$update_like = false;

        $user_id = Auth::id();
        $sample = Sample::find($sample_id);

        if(!$sample)
        {
            return null;
        }

        $like_exists = Like::where('sample_id','=',$sample_id)->where('user_id','=',$user_id)->first();

        if($like_exists)
        {
              $already_like  = $like_exists->like == 'true';

              if($is_like == $already_like)
              {
                  $like_exists->delete();
              }else
              {

              }

            /*if($is_like == $like_exists->like)
            {
                $like_exists->delete();
            }*/

        }else {

            $like = new Like();
            $like->user_id = $user_id;
            $like->sample_id = $sample_id;
            $like->like = $is_like;
            $like->save();

        }



    }

    public function likeCount(Request $request)
    {

        $like_count = Like::where('sample_id',$request->sample_id)->where('like','=',1)->count();
        $like_dis_count = Like::where('sample_id',$request->sample_id)->where('like','=',0)->count();
        return response()->json(['like_count'=>$like_count,'like_dis_count'=>$like_dis_count]);
    }


}
