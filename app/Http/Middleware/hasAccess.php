<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class hasAccess
{
    public function handle($request, Closure $next, $permission)
    {
        if (Gate::denies($permission)) {
            return response()->json(['message' => 'Insufficient Permissions'], 403);
        }
        return $next($request);
    }
}
