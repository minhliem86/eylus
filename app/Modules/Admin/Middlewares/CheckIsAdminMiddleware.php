<?php

namespace App\Modules\Admin\Middlewares;

use Closure;
use Auth;

class CheckIsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct()
    {
        $this->auth = Auth::guard('web');
    }

    public function handle($request, Closure $next)
    {
        if(!$this->auth->check()){
            return redirect('/admin/login');
        }else if (!$this->auth->user()->hasRole('admin')){
            return back()->with('error','You do not have permission');
        }else{
            return $next($request);
        }

    }
}
