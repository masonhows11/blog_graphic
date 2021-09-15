<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesFrontController extends Controller
{

    public function index()
    {
        $courses = Course::where('status_publish','=',1)->get();
        $categories = Category::where('parent_id',null)->get();
        return view('front.course.courses')
            ->with(['categories'=>$categories,'courses'=>$courses]);
    }



}
