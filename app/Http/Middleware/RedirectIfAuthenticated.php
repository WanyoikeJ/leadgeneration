<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        switch ($guards) {
            case 'admin':
                if (Auth::guard($guards)->check()) {
                    return redirect('/adminsettings');
                }
                break;
            default:
                if (Auth::guard($guards)->check()) {
                    return redirect(RouteServiceProvider::HOME);
                    // return redirect('/login');
                }
            break;
        }
        return $next($request);
    }
}
