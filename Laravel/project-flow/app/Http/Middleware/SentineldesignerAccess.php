<?php
namespace App\Http\Middleware;
use Closure;
use Sentinel;
use Session;
class SentineldesignerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // First make sure there is an active session
        if (!Sentinel::check()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('getlogin'));
            }
        }
        // Now check to see if the current user has the 'Boss' permission
        if (!Sentinel::getUser()->inRole('designer')) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                Session::flash('error', trans('auth.user.noaccess'));
                return redirect()->route('getlogin');
            }
        }
        // All clear - we are good to move forward
        return $next($request);
    }
}