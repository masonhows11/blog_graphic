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
        $creatives = Creative::all();
        return view('admin.creative_management.index')
            ->with('creatives',$creatives);
    }

    public function create()
    {
        return view('admin.creative_management.create');
    }


    public function store(Request $request)
    {

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
        if ($request->has('image')){

            $image = str_ireplace('http://localhost/template/creativity/','',$request->image);
        }
        try {
            Creative::create([
                'name'=> $request->name,
                'title'=>$request->title,
                'image'=>$image,
                'description' => $request->description,
                'user_id'=> Auth::id(),
            ]);
        }catch (Exception $ex)
        {
            return redirect('/admin/creative/index')
                ->with('error','کاربر گرامی خطایی هنگام ذخیره سازی رخ داده است.');
        }

         return redirect('/admin/creative/index')
             ->with('success','خلاقیت با موفقیت ایجاد شد.');



    }

    public function edit(Request $request)
    {
        $creative = Creative::findOrFail($request->creative);

        return view('admin.creative_management.edit')
            ->with(['creative'=>$creative]);

    }

    public function update(Request $request)
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
        if ($request->has('image')){

            $image = str_ireplace('http://localhost/template/creativity/','',$request->image);
        }

        $creative = Creative::findOrFail($request->id);
        $creative->title = $request->title;
        $creative->description = $request->description;
        $creative->image = $image;
        $creative->save();


        return redirect('/admin/creative/index')
            ->with('success','خلاقیت با موفقیت ویرایش شد. ');
    }

    public function changeStatus(Request $request)
    {
        $creative = Creative::find($request->creative);
        if($creative->status === 0)
        {
            $creative->status = 1;
            $creative->save();
            return redirect()->back()->with('success','وضعیت  بروز رسانی شد.');
        }
        $creative->status = 0;
        $creative->save();
        return redirect()->back()->with('success','وضعیت  بروز رسانی شد.');
    }

    public function delete(Request $request)
    {
        Creative::destroy($request->creative);
        return redirect('admin/creative/index')
            ->with('success','خلاقیت با موفقیت حذف شد.');
    }
}
