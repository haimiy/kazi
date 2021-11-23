<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrarMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if (auth()->user()->role_id == 3 ) {
            return $next($request);
        }
        else if(auth()->user()->role_id == 5){
            return redirect('user/index');
        }
        else if(auth()->user()->role_id == 4){
            return redirect('inspector/index');
        }
        else if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ){
            return redirect('admin/index');
        }
        else{
        return response()->json('You are not allowed to access');
        }
    }
}
