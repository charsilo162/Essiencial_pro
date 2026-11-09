<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionUserType
{
    public function handle(Request $request, Closure $next, string ...$types): Response
    {
        $type = session('user.type') ?? session('user.role') ?? '';

        if (!session('api_token') || !in_array($type, $types, true)) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}