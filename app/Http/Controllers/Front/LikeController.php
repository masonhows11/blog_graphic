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


        $sample_id = $request->sample_id;
        $is_like = $request['is_like'] === 'true';
        $user_id = Auth::id();
        $sample = Sample::find($sample_id);
        if (!$sample) {
            return null;
        }
        $like_exists = Like::where('sample_id', '=', $sample_id)->where('user_id', '=', $user_id)->first();
        if ($like_exists) {
            $already_like = $like_exists->like;

            if ($already_like == $is_like) {
                $like_exists->delete();
                //return null;
            } elseif ($already_like != $is_like) {
                $like_exists->like = $is_like;
                $like_exists->save();
                //return null;
            }
        } else {
            $like = new Like();
            $like->user_id = $user_id;
            $like->sample_id = $sample_id;
            $like->like = $is_like;
            $like->save();
        }
        $like = Like::where('sample_id', '=', $sample_id)->where('user_id', '=', $user_id)->first();
        return response()->json($like);
    }

    public function likeCount(Request $request)
    {

        $likes = Like::where('sample_id', $request->sample_id)
            ->where('like', '=', 1)->count();

        $dislikes = Like::where('sample_id', $request->sample_id)
            ->where('like', '=', 0)->count();

        return response()
            ->json(['likes' => $likes, 'dislikes' => $dislikes]);
    }


}
