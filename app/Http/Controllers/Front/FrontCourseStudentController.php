<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontCourseStudentController extends Controller
{

    public function addFreeCourse(Request $request)
    {
       // return $request;
        $course_id = $request->course_id;
        $user_id = Auth::id();

        CourseUser::create([
            'course_id' => $course_id,
            'user_id' => $user_id,
        ]);
        $success = '.ثبت نام با موفقیت انجام شد';
        return redirect()->back()->with(['success'=>$success]);
    }

}
