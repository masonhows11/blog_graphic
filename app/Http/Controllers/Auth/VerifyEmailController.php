<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegisterUserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class VerifyEmailController extends Controller
{
    public function verifyEmail($activation_code)
    {
        $user = User::where('activation_code', $activation_code)->first();
        if (!$user) {
            return redirect('/loginForm')->with('error', 'کاربر مورد نظر پیدا نشد');
        } elseif ($user && $user->email_verified_at != null) {
            return redirect('/loginForm')->with('error', 'این ایمیل قبلا تایید شده');
        } else if ($user && $user->email_verified_at == null) {
            $user->email_verified_at = Date::now();
            $user->save();
        }
        Auth::login($user);
        return redirect()->route('home');

    }
    public function resendVerifyForm()
    {
        return view('auth.resend_verify_link');
    }

    public function resendVerifyLink(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            return redirect()->back()->with('error','این آدرس ایمیل وجود ندارد');
        }
        elseif($user && $user->email_verified_at != null)
        {
            return redirect()->back()->with('error','این آدرس ایمیل قبلا تایید شده');
        }
        RegisterUserEvent::dispatch($user);
        return redirect()->route('loginForm')
            ->with('success','لینک فعال سازی به ایمیل شما ارسال شد.در صورت دریافت نکردن لینک به پروفایل کاربری مراجعه کنید');
    }
}
