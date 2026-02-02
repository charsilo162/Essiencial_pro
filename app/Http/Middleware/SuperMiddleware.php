<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Session;

class SuperMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Session::get('user');

        if (!$user) {
            return redirect()->route('logins');
        }

        // Your old logic — now works perfectly
        if ($user['type'] === 'user') {
            return redirect()->route('profile2');
        }
        if ($user['type'] != 'super') {
            return redirect()->route('my.course');
        }
// dd($request);
        return $next($request);
    }
}
