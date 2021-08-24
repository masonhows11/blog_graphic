<?php

namespace App\Http\Controllers\Auth;


use App\Events\ResetPasswordEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Date;
use Illuminate\Testing\Fluent\Concerns\Has;

class ResetPassController extends Controller
{
    //
    public function resetPassForm(){
        return view('auth.reset_pass');
    }

    public function verifyEmailPass(Request $request){

        $user = User::where('email',$request->email)->first();

        if(!$user)
        {
            return redirect()->back()->with('error','این آدرس ایمیل وجود ندارد');
        }
       DB::table('password_resets')
            ->insert(['email' => $user->email,'token' => Str::random(40),'created_at'=>Date::now()]);
       $user_info = DB::table('password_resets')->where('email',$user->email)->first();

        ResetPasswordEvent::dispatch($user_info);
        return redirect()->route('resetPassForm')
            ->with('info','لینک تغییر رمز عبور برای شما ارسال شد.');
    }

    public function handleResetPassForm($token,$email)
    {
        $user= DB::table('password_resets')
            ->where('email','=',$email)
            ->where('token',$token)->select('email')->first();
        return view('auth.reset_pass_handle')->with('email',$user->email);


    }

    public function handleResetPass(Request $request)
    {

        $user = User::where('email',$request->email)->first();

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:7|max:15|confirmed'
        ],$messages=[
            'email.required'=>'ایمیل را وارد کنید',
            'email.email'=>'ایمیل وارد شده معتبر نمیباشذ',
            'password.required' => 'رمز عبور جدید را وارد کنید',
            'password.min'=>'حداقل ۸ کاراکتر',
            'password.max'=>'حداکثر ۱۵ کاراکتر',
            'password.confirmed' => 'رمز عبور و تکرار آن یکسان نیستند'
        ]);

        $user->password = Hash::make($request->password);

        if($user->save()){
            return redirect()
                ->route('loginForm')
                ->with('success','رمز عبور با موفقیت تغییر کرد.');
        }else
        {
            return redirect()->back()->with('error','خطا در تغییر رمز عبور');
        }
    }

}
