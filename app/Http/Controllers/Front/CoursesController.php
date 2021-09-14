<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function index()
    {
        $categories = Category::where('parent_id',null)->get();
        return view('front.course.index')
            ->with('categories',$categories);
    }

}
