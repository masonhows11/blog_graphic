<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request)
    {
       // return $request;

        $request->validate([
            'description' => 'required|min:20|max:400'

        ],$messages = [
            'description.required' => 'متن دیدگاه را وارد کنید.',
            'description.min' => 'متن دیدگاه باید حداقل 20 کاراکتر باشد.',
        ]);

        if($request->has('sample_id')){

            Comment::create([
                'user_name' => Auth::user()->user_name,
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'sample_id' => $request->sample_id,
                'description'=> $request->description
            ]);
        }

        if ($request->has('creative_id')){

            Comment::create([
                'user_name' => Auth::user()->user_name,
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'creative_id' => $request->creative_id,
                'description'=> $request->description
            ]);
        }
        if ($request->has('tip_id')){

            Comment::create([
                'user_name' => Auth::user()->user_name,
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'tip_id' => $request->tip_id,
                'description'=> $request->description
            ]);
        }


        return redirect()->back()->with('message','دیدگاه شما با موفقیت ثبت شد، پس از بررسی نمایش داده خواهد شد.');


    }


}
