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
        $update_like = false;
        $sample = Sample::find($sample_id);
        if (!$sample) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('sample_id', $sample_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update_like = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->sample_id = $sample->id;
        $like->like = $is_like;
        if ($update_like) {
            $like->update();
        } else {
            $like->save();
        }
        return null;
    }

    public function likeCount()
    {

    }
}
