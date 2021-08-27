<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sample;
use Illuminate\Http\Request;

class SampleFrontController extends Controller
{
    //

    public function index()
    {
        $categories = Category::where('parent_id',null)->get();
        $samples = Sample::all();
        return view('front.samples.samples')
            ->with(['categories'=>$categories,'samples'=>$samples]);
    }

    public function sample($sample)

    {   $categories = Category::where('parent_id',null)->get();
        $sample = Sample::where('slug','=',$sample)->first();
        return view('front.samples.sample')->with(['sample'=>$sample,'categories'=>$categories]);
    }
    public function samplesCategory(Request $category)
    {
        return $category;
    }

}
