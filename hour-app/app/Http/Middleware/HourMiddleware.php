<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HourMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(session()->has("message") || session()->has("visited")) {
            session()->forget("message");
            session()->put("visited", true);
            return $next($request);
        }

        $hour = now()->hour+3;

        if($hour >= 9 && $hour < 12) {
            $message = "Günaydın!";
        }else if($hour >= 12 && $hour < 18) {
            $message = "İyi Günler!";
        }else if($hour >= 18 && $hour < 22) {
            $message = "İyi Aksamlar!";
        }else{
            $message =null;
        }

        if($message) {
            session()->put("message", $message);
        }

        return $next($request);
    }
}

