<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();

            if ($user->role == 'gestionnaire') {
                return $next($request);
            }

            return redirect()->route('dashboard');
        }

        return redirect('/login');
    }

}
