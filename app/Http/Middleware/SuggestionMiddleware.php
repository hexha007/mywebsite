<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Suggestion;

class SuggestionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
               // Menghitung jumlah saran yang belum dibalas
               $unreadCount = Suggestion::whereNull('response')->count();
               $latestSuggestions = Suggestion::latest()->take(5)->get();
       
               // Membagikan variabel ke view
               view()->share('unreadCount', $unreadCount);
               view()->share('latestSuggestions', $latestSuggestions);
       
               return $next($request);
    }
}
