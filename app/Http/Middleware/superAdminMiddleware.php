<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class superAdminMiddleware
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
        $admin_id = Session::get('admin_id');
        if ($admin_id == NULL) {
            return Redirect::to('admin');
        }else{
        return $next($request);
    }
  }

}