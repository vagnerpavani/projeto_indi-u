<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Admin
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

        $user = Auth::user();

        $permission = $user->is_admin;


        if($permission == true){
            return $next($request);
        }
        else{
            return response()->json(['ACESSO NEGADO!']);
        }
    }
}
