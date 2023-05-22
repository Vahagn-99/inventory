<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next):Response|RedirectResponse
    {
        if ($request->user()->isSuperAdmin()) {
            return $next($request);
        }
        return redirect('api/not-allowed');
    }
}
