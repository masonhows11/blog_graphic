<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Creative;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;

class CreativeController extends Controller
{
    //

    public function index()
    {
        return view('admin.creative_management.index');
    }

    public function create()
    {
        return view('admin.creative_management.create');
    }


    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'name' => 'required|max:50',
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'image' => 'required',
        ], $messages = [
            'name.required' => 'فیلد نام الزامی است.',
            'name.max' => 'حداکثر ۵۰ کاراکتر.',
            'title.required' => 'فیلد عنوان الزامی است.',
            'title.max' => 'حداکثر ۵۰ کاراکتر.',
            'description.required' => 'فیلد توضیحات الزامی است.',
            'description.max' => 'تعداد کاراکتر بیش از حد مجاز.',
            'image.required' => 'عکس اصلی را انتخاب کنید.',
        ]);

        try {
            Creative::create([
                'name'=> $request->name,
                'title'=>$request->title,
                'description' => $request->description,
                'user_id'=> Auth::id(),
            ]);
        }catch (Exception $ex)
        {
            return redirect('/admin/creative/index')
                ->with('error','کاربر گرامی خطایی هنگام ذخیره سازی داده است.');
        }

         return redirect('/admin/creative/index')
             ->with('success','خلاقیت با موفقیت ایجاد شد.');



    }

    public function edit()
    {

    }

    public function update(Request $request)
    {

    }

    public function changeStatus()
    {

    }

    public function delete()
    {

    }
}
