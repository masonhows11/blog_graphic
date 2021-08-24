<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.user_management.index')
            ->with('users',$users);
    }

    public function delete(Request $request)
    {
       User::destroy($request->user);
       return redirect()->back()->with('success','کاربر مورد نظر حذف شد.');
    }
}
