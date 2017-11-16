<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $admin_id = session::get('admin_id');
        if ($admin_id != NULL) {
            return Redirect::to('dashboard');
        }else{
        return $next($request);
     }
    }
}
