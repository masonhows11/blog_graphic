<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampleFController extends Controller
{
    //

    public function index()
    {
        return view('front.samples.samples');
    }

}
