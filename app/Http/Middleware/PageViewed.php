<?php

namespace App\Http\Middleware;

use Closure;
use App\Events\PageViewed as PageViewedEvent;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageViewed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        event(new PageViewedEvent($request->url(), auth()->id()));

        return $next($request);
    }
}
