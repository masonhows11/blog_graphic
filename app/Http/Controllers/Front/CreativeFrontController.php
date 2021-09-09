<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Creative;
use Illuminate\Http\Request;

class CreativeFrontController extends Controller
{
    //

    public function index(){

        $creatives = Creative::where('status','=',1)->get();
        return view('front.creatives.creatives')
            ->with(['creatives'=>$creatives]);
    }

    public function creative($creative)
    {
        $creative = Creative::with(['likes','comments' => function($query){
            $query->where('approved',1);
        }])->where('slug','=',$creative)->first();

        return view('front.creatives.creative')->with(['creative'=>$creative]);
    }
}
