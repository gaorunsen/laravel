<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        /**
        * seesion函数
        * 第一种用法(读取);
        *   @param [string] $[name] [需要读取的session变量名]
        */
        if(!session('uid')){
            //重定向
            return redirect('/login');
        }
        return $next($request);
    }
}
