<?php

namespace Anam\Dashboard\Http\Middleware;

use Anam\Dashboard\Models\Menu;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckPermission
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
    $route_path = $request->path();
    $getMenuId = Menu::where('route_name', $route_path)->first();
    if (isset($getMenuId->id)) {
      $has_permission = DB::table('priority_menu')->where('priority_id', $request->user()->user_level)
        ->where('menu_id', $getMenuId->id)->first();
    } else {
      $has_permission = false;
    }
    if (!$has_permission) {
      return redirect(route('dashboard.index'));
    }
    return $next($request);
  }
}
