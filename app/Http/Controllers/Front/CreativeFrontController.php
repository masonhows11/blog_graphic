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
}
