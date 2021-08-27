<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sample;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class SampleController extends Controller
{
    //
    public function index()
    {
        $samples = Sample::all();
        return view('admin.sample_management.index')
            ->with('samples', $samples);
    }

    public function create()
    {
        $parent_categories = Category::where('parent_id', null)->get();
        return view('admin.sample_management.create')
            ->with('parent_categories', $parent_categories);
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required|max:2000',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required'
        ], $messages = [
            'title.required' => 'فیلد عنوان الزامی است.',
            'title.max' => 'حداکثر ۱۰۰ کاراکتر.',
            'description.required' => 'فیلد توضیحات الزامی است.',
            'description.max' => 'تعداد کاراکتر بیش از حد مجاز.',
            'image1.required' => 'یک تصویر انتخاب کنید.',
            'image2.required' => 'یک تصویر انتخاب کنید.',
            'image3.required' => 'یک تصویر انتخاب کنید.',
            'image4.required' => 'یک تصویر انتخاب کنید.',
            'cat.required' => 'یک دسته بندی انتخاب کنید.',
        ]);


        $img_array=[];
        if($request->has(['image1','image2','image3','image4'])){

            array_push($img_array,$request->input('image1'),
                $request->input('image2'),
                $request->input('image3'),
                $request->input('image4'));
        }
        $img_name_array=[];
        $array_count = count($img_array);
        for ($i = 0 ; $i < $array_count ; $i++ )
        {
        array_push($img_name_array,str_replace('http://localhost/template/samples/','',$img_array[$i]));
        }





        $sample = Sample::create([
            'title' => $request->title,
            'description' => $request->description,
            'image1'=>$img_name_array[0],
            'image2'=>$img_name_array[1],
            'image3'=>$img_name_array[2],
            'image4'=>$img_name_array[3],
        ]);
        $sample->categories()->sync($request->cat);
        return redirect('/admin/sample/index')
            ->with('success','نمونه کار با موفقیت ایجاد شد. ');

    }

    public function edit(Request $request)
    {
        $sample = Sample::with('categories')
            ->where('id',$request->sample)->first();

        $parent_categories = Category::where('parent_id', null)->get();
        return view('admin.sample_management.edit')
            ->with(['parent_categories'=>$parent_categories,'sample'=>$sample]);
    }

    public function update(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:150',
            'description' => 'required|max:2000',
            'image1' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'image4' => 'required'
        ], $messages = [
            'title.required' => 'فیلد عنوان الزامی است.',
            'title.max' => 'حداکثر ۱۰۰ کاراکتر.',
            'description.required' => 'فیلد توضیحات الزامی است.',
            'description.max' => 'تعداد کاراکتر بیش از حد مجاز.',
            'image1.required' => 'یک تصویر انتخاب کنید.',
            'image2.required' => 'یک تصویر انتخاب کنید.',
            'image3.required' => 'یک تصویر انتخاب کنید.',
            'image4.required' => 'یک تصویر انتخاب کنید.',
            'cat.required' => 'یک دسته بندی انتخاب کنید.',
        ]);

        $img_array=[];
        if($request->has(['image1','image2','image3','image4'])){

            array_push($img_array,$request->input('image1'),
                $request->input('image2'),
                $request->input('image3'),
                $request->input('image4'));
        }
        $img_name_array=[];
        $array_count = count($img_array);
        for ($i = 0 ; $i < $array_count ; $i++ )
        {
            array_push($img_name_array,str_replace('http://localhost/template/samples/','',$img_array[$i]));
        }

        $sample = Sample::findOrFail($request->id);
        $sample->title = $request->title;
        $sample->description = $request->description;
        $sample->image1 = $img_name_array[0];
        $sample->image2 = $img_name_array[1];
        $sample->image3 = $img_name_array[2];
        $sample->image4 = $img_name_array[3];
        $sample->save();

        $sample->categories()->sync($request->cat);
        return redirect('/admin/sample/index')
            ->with('success','نمونه کار با موفقیت ویرایش شد. ');

    }


    public function changeStatus(Request $request): \Illuminate\Http\RedirectResponse
    {
        $sample = Sample::find($request->sample);
        if($sample->approved == 0)
        {
            $sample->approved = 1;
            $sample->save();
            return redirect()->back()->with('success','وضعیت مقاله بروز رسانی شد.');
        }else
            $sample->approved = 0;
        $sample->save();
        return redirect()->back()->with('success','وضعیت مقاله بروز رسانی شد.');
    }
    public function delete(Request $request)
    {
       Sample::destroy($request->sample);
        return redirect('admin/sample/index')
            ->with('success','نمونه کار با موفقیت حذف شد.');
    }

}
