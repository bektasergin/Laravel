<?php

namespace App\Http\Middleware;

use App\Models\UserToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('user_token')){
            $user_token = Session::get('user_token');
            $control = UserToken::where('token', $user_token)->first();
            $now = strtotime(date('Y-m-d H:i:s'));
            if($control->valid_until < $now){
                Session::forget('user_token');
                return redirect('/');
            }else{
                return $next($request);
            }
        }else{
            return redirect('/');
        }
    }
}
