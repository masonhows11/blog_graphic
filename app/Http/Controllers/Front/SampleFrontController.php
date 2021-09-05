<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sample;
use Illuminate\Http\Request;


class SampleFrontController extends Controller
{


    public function index()
    {
        $categories = Category::where('parent_id', null)->get();
        $samples = Sample::where('approved', '=', 1)->get();
        return view('front.samples.samples')
            ->with(['categories' => $categories, 'samples' => $samples]);
    }

    public function sample($sample)

    {
        $categories = Category::where('parent_id', null)->get();

        $sample = Sample::with(['categories', 'likes', 'comments' => function ($query) {
            $query->where('approved', 1);
        }])->where('slug', '=', $sample)->first();

        return view('front.samples.sample')->with(['sample' => $sample, 'categories' => $categories]);
    }

    public function samplesCategory($category)
    {
        $categories = Category::where('parent_id', null)->get();
        $samples = Sample::with('categories')
            ->join('category_sample', 'samples.id', '=', 'category_sample.sample_id')
            ->join('categories', 'categories.id', '=', 'category_sample.category_id')
            ->where('categories.name', '=', $category)->select('samples.*')->get();

        return view('front.samples.samples_base_category')
            ->with(['samples' => $samples, 'categories' => $categories]);

    }

}
