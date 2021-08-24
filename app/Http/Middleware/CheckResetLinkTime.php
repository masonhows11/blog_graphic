<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class CheckResetLinkTime
{
    /**
     * Handle an incoming request.
     *
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->route('token');
        $email = $request->route('email');

        $link = DB::table('password_resets')
            ->where('token', '=', $token)
            ->where('email', '=', $email)->select('created_at')->first();

          $expired  = Carbon::parse($link->created_at)->addMinutes(60)->isPast();
          if($expired)
          {
              return  redirect()->route('loginForm')->with('error','لینک منقضی شده است.');
          }




        return $next($request);
    }
}
