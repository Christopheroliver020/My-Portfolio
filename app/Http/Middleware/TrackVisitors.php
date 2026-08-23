<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        /*
        |--------------------------------------------------------------------------
        | Don't track dashboard/admin pages
        |--------------------------------------------------------------------------
        */

        if (
            $request->is('dashboard') ||
            $request->is('dashboard/*') ||
            $request->is('posts*') ||
            $request->is('messages*') ||
            $request->is('visitors*')
        ) {
            return $next($request);
        }


        /*
        |--------------------------------------------------------------------------
        | Only track normal GET requests
        |--------------------------------------------------------------------------
        */

        if ($request->isMethod('GET')) {

            Visitor::create([
                'ip_address' => $request->ip(),

                'user_agent' => $request->userAgent(),

                'page' => $request->path(),

                'visited_at' => now(),
            ]);
        }


        return $next($request);
    }
}
