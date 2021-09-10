<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TipController extends Controller
{
    //
    public function index()
    {
        $tips = Tip::all();
        return view('admin.tip_management.index')
            ->with('tips',$tips);
    }

    public function create()
    {
        return view('admin.tip_management.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:tips|max:200',
            'short_description' => 'required|max:300',
            'description'=>'required|min:50',
            'image'=>'required'
        ],$messages=[
            'title.required'=>'فیلد عنوان الزامی است.',
            'title.unique'=>'این عنوان تکراری است.',
            'title.max'=>'حداکثر ۱۰۰ کاراکتر.',
            'short_description.required'=>'فیلد چکیده الزامی است.',
            'short_description.max'=>'حداکثر ۲۰۰ کاراکتر.',
            'description.required'=>'فیلد توضیحات الزامی است.',
            'image.required'=>'فیلد تصویر لازامی است.'
        ]);

        if ($request->has('image')){

            $image = str_ireplace('http://localhost/template/tips/','',$request->image);
        }


        Tip::create([
            'title' => $request->title,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'image'=>$image,
            'writer'=> Auth::user()->user_name,
        ]);

        return redirect('admin/tip/index')->with('success','نکته طلایی با موفقیت ذخیره شد.');

    }


    public function edit(Request $request)
    {
           return view('admin.tip_management.edit')
               ->with('tip',Tip::find($request->tip));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'short_description' => 'required|max:300',
            'description'=>'required|min:50',
            'image'=>'required'
        ],$messages=[
            'title.required'=>'فیلد عنوان الزامی است.',
            'title.unique'=>'این عنوان تکراری است.',
            'title.max'=>'حداکثر ۱۰۰ کاراکتر.',
            'short_description.required'=>'فیلد چکیده الزامی است.',
            'short_description.max'=>'حداکثر ۲۰۰ کاراکتر.',
            'image.required'=>'فیلد تصویر لازامی است.'
        ]);

        if ($request->has('image')){

            $image = str_ireplace('http://localhost/template/tips/','',$request->image);
        }

        Tip::where('id',$request->id)
                ->update([
                    'title' => $request->title,
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'image'=>$image
                ]);
        return redirect('admin/tip/index')->with('success','نکته طلایی با موفقیت ویرایش شد.');

    }

    public function changeStatus(Request $request)
    {
         $tip = Tip::find($request->tip);
         
        if($tip->status === 0)
        {
            $tip->status = 1;
            $tip->save();
            return redirect()->back()->with('success','وضعیت مقاله بروز رسانی شد.');
        }
            $tip->status = 0;
            $tip->save();
            return redirect()->back()->with('success','وضعیت مقاله بروز رسانی شد.');

    }

    public function delete(Request $request)
    {
        Tip::destroy($request->tip);
        return redirect('admin/tip/index')->with('success','نکته طلایی با موفقیت حذف شد.');
    }

}

