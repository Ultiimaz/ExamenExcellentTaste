<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd($request->user()->status);
        if($request->user()->status < 1)
        {

            return back()->with('status','Uw account is geblokkeerd!');
        }else

        if($request->user()->status == 1)
        {

        }else

        if($request->user()->status ===  2)
        {
            return view('layouts.beheerder');
        }
        return $next($request);
    }
}
