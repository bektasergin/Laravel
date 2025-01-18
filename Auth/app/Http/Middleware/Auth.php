<?php

namespace App\Http\Middleware;

use App\Models\Kisi;
use App\Models\UserToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->input('user');
        $pass = $request->input('password');
        $control = Kisi::where('nickname', $user)->first();
        if($control !== null) {
            if (Hash::check($pass, $control->password)) {
                $token = md5(uniqid());
                $user_token = new UserToken();
                $user_token->token = $token;
                $user_token->user_id = $control->id;
                $user_token->valid_until = strtotime(date('Y-m-d H:i:s')) + 3*60*60;
                $user_token->created_at = date('Y-m-d H:i:s');
                $user_token->created_by = $control->id;
                $user_token->save();
                Session::put('user_token', $token);
                Session::put('user_id', $control->id);
                Session::put('user_name', $control->nickname);
                return $next($request);
            } else {
                $message = 'Kullanıcı adı veya şifre hatalı';
                return redirect('/')->with(['message' => $message]);
            }
        }else{
            $message = 'Kullanıcı adı veya şifre hatalı';
            return redirect('/')->with(['message' => $message]);
        }
    }
}
