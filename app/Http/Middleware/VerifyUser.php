<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = Auth::user();
       if($user->email_verified_at != null)
       {
           return $next($request);
       }
       else
       {
           return redirect()->route('resend_verify_email')
               ->with('warning','حساب کاربری شما فعال نشده یا ثبت نام نکرده اید.');
       }

    }
}
