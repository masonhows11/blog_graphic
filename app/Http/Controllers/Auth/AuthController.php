<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AuthController extends Controller
{

    public function registerForm()
    {
        return view('auth.register_user');
    }

    public function registerUser(Request $request)
    {

        $validated = $request->validate([
            'user_name' => 'required|max:30|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|max:20:min:8',
           /* 'g-recaptcha-response' => function($attribute,$value,$fail){
                $secret_key = config('services.recaptcha.secret');
                $response = $value;
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if(!$response->success){
                   Session::flash('g-recaptcha-response-error','گزینه من ربات نیستم را انتخاب کنید.');
                    $fail($attribute.'google reCaptcha failed');
                }
            },*/
        ], $messages = [
            'user_name.unique' => 'این نام کاربری تکراری است',
            'user_name.required' => 'نام کاربری را وارد کنید ',
            'email.required' => 'آدرس ایمیل را وارد کنید',
            'email.unique' => 'این ایمیل تکراری است',
            'password.required' => 'رمز عبور را وارد کنید',
            'password.max' => 'حداکثر تعداد کاراکتر رمز عبور۲۰ کاراکتر',
            'password.min' => 'حداقل تعداد کاراکتر رمز عبور۸  کاراکتر',
            'password.confirmed' => 'رمز عبور و تکرار آن یکی نیستند'
        ]);

        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_code' => Str::random(40),
        ]);

        RegisterUserEvent::dispatch($user);
        return redirect()
            ->back()
            ->with('success', 'لینک فعال سازی به ایمیل شما ارسال شد.در صورت دریافت نکردن لینک به پروفایل کاربری مراجعه کنید');

    }

    public function loginForm()
    {
        return view('auth.login_user');
    }

    public function login(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
//            'remember' => 'required',
           /* 'g-recaptcha-response' => function($attribute,$value,$fail){
                $secret_key = config('services.recaptcha.secret');
                $response = $value;
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response";
                $response = \file_get_contents($url);
                $response = json_decode($response);
                if(!$response->success){
                    Session::flash('g-recaptcha-response-error','گزینه من ربات نیستم را انتخاب کنید.');
                    $fail($attribute.'google reCaptcha failed');
                }
            },*/
        ], $messages = [
            'email.required' => 'آدرس ایمیل را وارد کنید',
            'password.required' => 'رمز عبور را وارد کنید',
          /*  'password.max' => 'حداکثر تعداد کاراکتر رمز عبور۲۰ کاراکتر',
            'password.min' => 'حداقل تعداد کاراکتر رمز عبور۸  کاراکتر',*/
            'remember.required' => 'توافق نامه را انتخاب کنید',

        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {

            $Auth = Auth::user();
            if ($Auth->hasExactRoles('admin')){
                return redirect()->route('admin_dash');
            }else

            return redirect()->route('home');
        } else
            return redirect()->back()->with('error', 'نام کاربری یا رمز عبور اشتباه است.');


    }



    public function showProfile()
    {
        return view('auth.profile');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
