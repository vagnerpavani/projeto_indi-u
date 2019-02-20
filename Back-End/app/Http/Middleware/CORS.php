<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        $resposta = $next($request);

        $resposta ->header->set('Access-Control-Allow-Origin' , 'http://localhost:4200')
                  ->header->set('Access-Control-Allow-Methods' , 'GET, POST, PUT, DELETE, OPTIONS' )
                  ->header->set('Access-Control-Allow-Headers' , 'Authorization, Content-Type' );

        return $resposta ;
    }
}
