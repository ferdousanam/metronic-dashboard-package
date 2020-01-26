<?php

namespace Anam\Dashboard\app\Http\Middleware;

use Closure;

class CheckSuperUser
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
    if (!super_user()) {
      return redirect(route('dashboard.index'));
    }
    return $next($request);
  }
}
