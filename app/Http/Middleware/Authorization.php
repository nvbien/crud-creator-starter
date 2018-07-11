<?php

namespace App\Http\Middleware;

use App\Models\ActivityLog;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login');
        }
        $user = Auth::guard($guard)->user();
        $role = $user->role;
        $route = Route::currentRouteName();
        $permissions = json_decode($role ? $role->permissions ? $role->permissions: [] : $user->permissions, true);
        $det_per = explode ('.', $route);
        if(!is_array($permissions)
            || (count($det_per) > 1
                && in_array($det_per[1],['index', 'create', 'edit', 'delete'])
                && !array_key_exists($route,$permissions))){
            App::abort(403, 'Access denied');
        }
        $uri = $request->getRequestUri();
        if(strlen($uri)< 200){
            $activity_log = new ActivityLog();
            $activity_log->fill([
                'url' => $request->getRequestUri(),
                'route_name' => $route,
                'user_id' => $user->id,
                'post_data' => ($request->isMethod('POST')? json_encode($request->all()): '')
            ])->save();
        }
//        $unread = Warning::where('status','<>','read')->count();
//        \Illuminate\Support\Facades\View::share('total_unread', $unread);
        return $next($request);
    }
}
