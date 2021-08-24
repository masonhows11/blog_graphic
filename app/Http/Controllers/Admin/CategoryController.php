<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        $parent_categories = Category::where('parent_id', null)->get();
        $categories = Category::all();
        return
            view('admin.category_management.index')
                ->with(['categories' => $categories, 'parent_categories' => $parent_categories]);

    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100',
            'title' => 'required|unique:categories|max:100',

        ], $message = [
            'name.required' => 'نام دسته بندی را وارد کنید',
            'name.unique' => 'این نام تکراری است',
            'name.max' => ' حداکثر ۳۰ کاراکتر ',
            'title.required' => 'نام دسته بندی را وارد کنید',
            'title.unique' => 'این نام تکراری است',
            'title.max' => ' حداکثر ۳۰ کاراکتر '
        ]);

        if ($request->has('parent')) {
            Category::create([
                'name' => $request->name,
                'title' => $request->title,
                'parent_id' => $request->parent,
            ]);
            return redirect()->back()->with('success', 'دسته بندی مورد با موفقیت ذخیره شد.');
        } else

            Category::create([
                'name' => $request->name,
                'title' => $request->title,
            ]);
        return redirect()->back()->with('success', 'دسته بندی مورد با موفقیت ذخیره شد.');

    }

    public function edit(Request $request)
    {
        $category = Category::find($request->cat);
        $categories = Category::all();
        return view('admin.category_management.edit')->with(['category' => $category, 'categories' => $categories]);
    }


    public function update(Request $request)
    {

        // return $request;
        $validated = $request->validate([
            'name' => 'required|max:100',
            'title' => 'required|max:100',
            'slug' => 'required|max:100'

        ], $message = [
            'name.required' => 'نام دسته بندی را وارد کنید',
            'name.max' => ' حداکثر ۳۰ کاراکتر ',
            'title.required' => 'نام دسته بندی را وارد کنید',
            'title.max' => ' حداکثر ۳۰ کاراکتر ',
            'slug.required' => 'اسلاگ به انگلیسی',
            'slug.max' => ' حداکثر ۳۰ کاراکتر '
        ]);


        if ($request->has('parent')) {
            Category::where('id', $request->id)
                ->update(['name' => $request->name,
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'parent_id' => $request->parent]);

            return redirect('/admin/category/index')->with('success', 'دسته بندی مورد با موفقیت ویرایش شد.');
        } else
            Category::where('id', $request->id)
                ->update(['name' => $request->name,
                    'title' => $request->title,
                    'slug' => $request->slug]);
        return redirect('/admin/category/index')->with('success', 'دسته بندی مورد با موفقیت ویرایش شد.');

    }

    public function detachFromParent(Request $request)
    {
        $category = Category::findOrFail($request->cat);
        $category->parent_id = null;
        $category->save();
        return redirect('/admin/category/index')->with('success', 'دسته بندی مورد نظر با موفقیت ویرایش شد.');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->cat);
        return redirect('/admin/category/index')->with('success', 'دسته بندی مورد نظر حذف شد.');
    }
}
