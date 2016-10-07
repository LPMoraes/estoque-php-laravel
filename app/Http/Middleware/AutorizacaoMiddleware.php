<?php

namespace estoque\Http\Middleware;

use Closure;
use Auth;

class AutorizacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)//o método é chamado a a cada requisição 
    {
        if(!$request->is('login') && Auth::guest())
        {                
            return redirect('home');          
        }

        return $next($request);
    }
}
