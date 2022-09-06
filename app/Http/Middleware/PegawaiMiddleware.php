<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PegawaiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('role') != "pegawai" || session()->get('role') == NULL) {
            return redirect("logout")->with('aksesDitolak', 'success');
        }
        return $next($request);
    }
}
