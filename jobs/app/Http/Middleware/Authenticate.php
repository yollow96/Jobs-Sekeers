<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  string[]  ...$guards
     *
     * @throws AuthenticationException
     */
    public function handle($request, Closure $next, ...$guards): Response
    {
        $this->authenticate($request, $guards);

        App::setLocale(getLoggedInUser()->language);

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('front.home');
        }
    }
}
