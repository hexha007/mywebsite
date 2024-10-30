<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\kompetensi;
use App\Models\profil;
use App\Models\kategori;
use App\Models\divisi;


class frontMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $kompetensinav=kompetensi::all();
        $profilnav=profil::get()->first();
        $kategorinav=kategori::all();
        $divisinav=divisi::all();

        // membagikan ke view
        view()->share('kompetensinav', $kompetensinav);
        view()->share('profilnav', $profilnav);
        view()->share('kategorinav', $kategorinav);
        view()->share('divisinav', $divisinav);
        return $next($request);
    }
}
