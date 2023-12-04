<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfGuest
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->route('login'); // 로그인 페이지로 리디렉션
        }

        return $next($request);
    }
}
