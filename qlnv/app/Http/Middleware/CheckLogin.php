<?php

namespace App\Http\Middleware;
//use App\Http\Middleware\Auth;

use Closure;
use Auth;
use ApP\User;

class CheckLogin
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
        if(!Auth::check()) {
            return redirect('login');
        } else {
            $user = User::find(Auth::user()->id);
            if($user->password_changed_at){
        
            return $next($request);//thực hiện phần code trong route
            } else {
                return redirect() -> route('changePassword.get');
            }
        }
    }
}
    

