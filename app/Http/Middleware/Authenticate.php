<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if(request()->getHost() === env('ADMIN_DOMAIN')){
            return route('admin.login');
        }

        if(request()->getHost() === env('WEB_DOMAIN')){
            return route('web.login');
        }

        if (! $request->expectsJson()) {
            return route('login');
        }
        // return $request->expectsJson() ? null : route('login');
    }
}
