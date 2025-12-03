<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AppGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // যদি কোনো গার্ড নির্দিষ্ট না করা থাকে, তবে ডিফল্ট গার্ড চেক করবে।
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // যদি ইউজারটি এই নির্দিষ্ট গার্ড দ্বারা লগইন করা থাকে
            if (Auth::guard($guard)->check()) { 
                
                // ইউজার টাইপ অনুযায়ী সঠিক ড্যাশবোর্ড রুটে রিডাইরেক্ট
                if ($guard === 'agent') {
                    return redirect()->route('agent.dashboard')->with('error', 'You are already Logged In.');
                } 
                
                // if ($guard === 'vendor') {
                //     return redirect('/vendor/dashboard');
                // }
                
                // ডিফল্ট ইউজার (User) অথবা null গার্ডের জন্য
                return redirect()->route('dashboard')->with('error', 'You are already Logged In.');
            }
        }

        return $next($request);
    }
}
