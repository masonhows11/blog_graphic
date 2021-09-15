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

    public function course($course)
    {
        $categories = Category::where('parent_id', null)->get();

        $course = Course::with(['categories', 'likes', 'comments' => function ($query) {
            $query->where('approved', 1);
        }])->where('slug', '=', $course)->first();

        return view('front.course.course')->with(['course' => $course ,'categories' => $categories]);


    }

    public function coursesCategory($category)
    {
        $categories = Category::where('parent_id', null)->get();
        $courses = Course::with('categories')
            ->join('category_course', 'courses.id', '=', 'category_course.course_id')
            ->join('categories', 'categories.id', '=', 'category_course.category_id')
            ->where('categories.name', '=', $category)->select('courses.*')->get();

        return view('front.course.courses_base_category')
            ->with(['courses' => $courses, 'categories' => $categories]);
    }


}
