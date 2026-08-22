<?php

namespace App\Http\middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekManajer
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Silahkan login terlebih dahulu');
        }

        if (Auth::user()->role !== 'manajer') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini');
        }
        return $next($request);
    }
}
