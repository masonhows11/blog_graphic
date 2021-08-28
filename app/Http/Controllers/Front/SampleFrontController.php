<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleFrontController extends Controller
{


    public function index()
    {
        $categories = Category::where('parent_id',null)->get();
        $samples = Sample::where('approved','=',1)->get();
        return view('front.samples.samples')
            ->with(['categories'=>$categories,'samples'=>$samples]);
    }

    public function sample($sample)

    {   $categories = Category::where('parent_id',null)->get();
        $sample = Sample::with('categories')->where('slug','=',$sample)->first();
        return view('front.samples.sample')->with(['sample'=>$sample,'categories'=>$categories]);
    }
    public function samplesCategory(Request $category)
    {
        // return $category;
        return DB::table('samples')->join('category_sample','samples.id','=','category_sample.category_id')
                        ->join('categories','categories.id','=','category_sample.category_id')
                        ->where('categories.slug','=',$category)->select('samples.*')->get();

    }

}
