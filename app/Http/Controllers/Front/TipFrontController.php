<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;

class TipFrontController extends Controller
{
    public function index(){

        $tips = Tip::where('status','=',1)->get();
        return view('front.tips.tips')
            ->with(['tips'=>$tips]);
    }

    public function tip($tip)
    {
        $tip = Tip::with(['likes','comments' => function($query){
            $query->where('approved',1);
        }])->where('slug','=',$tip)->first();

        return view('front.tips.tip')->with(['tip'=>$tip]);
    }
}
