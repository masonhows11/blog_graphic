<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Creative;
use App\Models\Like;
use App\Models\Sample;
use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LikeController extends Controller
{


    public function sampleLike(Request $request)
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

            } elseif ($already_like != $is_like) {
                $like_exists->like = $is_like;
                $like_exists->save();

            }
        } else {
            $like = new Like();
            $like->user_id = $user_id;
            $like->sample_id = $sample_id;
            $like->like = $is_like;
            $like->save();
        }
        $like = Like::where('sample_id', '=', $sample_id)->where('user_id', '=', $user_id)->first();
        if($like !==  null)
        {
            return response()->json($like);

        }
        if($like === null)
        {
            return response()->json($like);
        }

    }

    public function sampleLikeCount(Request $request)
    {

        $likes = Like::where('sample_id', $request->sample_id)
            ->where('like', '=', 1)->count();

        $dislikes = Like::where('sample_id', $request->sample_id)
            ->where('like', '=', 0)->count();

        return response()
            ->json(['likes' => $likes, 'dislikes' => $dislikes]);
    }


    public function creativeLike(Request $request)
    {



        $is_like = $request['is_like'] === 'true';
        $user_id = Auth::id();
        $creative = Creative::find($request->creative_id);
        if (!$creative) {
            return null;
        }
        $like_exists = Like::where('creative_id', '=',$request->creative_id)->where('user_id', '=', $user_id)->first();
        if ($like_exists) {
            $already_like = $like_exists->like;

            if ($already_like == $is_like) {
                $like_exists->delete();

            } elseif ($already_like != $is_like) {
                $like_exists->like = $is_like;
                $like_exists->save();

            }
        } else {
            $like = new Like();
            $like->user_id = $user_id;
            $like->creative_id = $request->creative_id;
            $like->like = $is_like;
            $like->save();
        }
        $like = Like::where('creative_id', '=', $request->creative_id)->where('user_id', '=', $user_id)->first();
        if($like !== null)
        {
            return response()->json($like);

        }

        if($like === null)
        {
            return response()->json($like);
        }

    }

    public function creativeLikeCount(Request $request)
    {

        $likes = Like::where('creative_id', $request->creative_id)
            ->where('like', '=', 1)->count();

        $dislikes = Like::where('creative_id', $request->creative_id)
            ->where('like', '=', 0)->count();

        return response()
            ->json(['likes' => $likes, 'dislikes' => $dislikes]);
    }

    public function tipLike(Request $request)
    {



        $is_like = $request['is_like'] === 'true';
        $user_id = Auth::id();
        $tip = Tip::find($request->tip_id);
        if (!$tip) {
            return null;
        }
        $like_exists = Like::where('tip_id', '=', $request->tip_id)->where('user_id', '=', $user_id)->first();
        if ($like_exists) {
            $already_like = $like_exists->like;

            if ($already_like == $is_like) {
                $like_exists->delete();

            } elseif ($already_like != $is_like) {
                $like_exists->like = $is_like;
                $like_exists->save();

            }
        } else {
            $like = new Like();
            $like->user_id = $user_id;
            $like->tip_id = $request->tip_id;
            $like->like = $is_like;
            $like->save();
        }
        $like = Like::where('tip_id', '=', $request->tip_id)->where('user_id', '=', $user_id)->first();
        if($like !== null)
        {
            return response()->json($like);

        }
        if($like === null)
        {
            return response()->json($like);
        }

    }

    public function tipLikeCount(Request $request)
    {

        $likes = Like::where('tip_id',$request->tip_id)
            ->where('like', '=', 1)->count();

        $dislikes = Like::where('tip_id', $request->tip_id)
            ->where('like', '=', 0)->count();

        return response()
            ->json(['likes' => $likes, 'dislikes' => $dislikes]);
    }

    /*
    public function sampleLike(Request $request)
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

            } elseif ($already_like != $is_like) {
                $like_exists->like = $is_like;
                $like_exists->save();

            }
        } else {
            $like = new Like();
            $like->user_id = $user_id;
            $like->sample_id = $sample_id;
            $like->like = $is_like;
            $like->save();
        }
        $like = Like::where('sample_id', '=', $sample_id)->where('user_id', '=', $user_id)->first();
        if($like != null)
        {
            return response()->json($like);

        }else if($like == null)
        {
            return response()->json($like);
        }

    }

    public function sampleLikeCount(Request $request)
    {

        $likes = Like::where('sample_id', $request->sample_id)
            ->where('like', '=', 1)->count();

        $dislikes = Like::where('sample_id', $request->sample_id)
            ->where('like', '=', 0)->count();

        return response()
            ->json(['likes' => $likes, 'dislikes' => $dislikes]);
    }*/


}
