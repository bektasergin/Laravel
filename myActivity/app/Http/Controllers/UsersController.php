<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function addUsers(Request $request){
        if($request->isMethod('post')){
            $user = new User();

            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            
            $errorMessages = [
                'name.required' => 'Ad alanı boş geçilemez!',
                'surname.required' => 'Soyad alanı boş geçilemez!',
                'email.required' => 'Email alanı boş geçilemez!',
                'email.email' => 'Lütfen geçerli bir email adresi giriniz!',
                'password.required' => 'Şifre alanı boş geçilemez!'
            ];

            $request->validate([
                'name' => 'required',
                'surname' => 'required',
                'email'=> 'required|email',
                'password'=> 'required'
            ],$errorMessages);
            
            if(empty($request->input('name'))||empty($request->input('surname'))||empty($request->input('email'))||empty($request->input('password'))){
                return redirect('/register')->with('warning',"İlgili alanlar boş geçilemez!");
                
            }

            if ($user->save()){
                return redirect('/login')->with('success','Kayıt Başarılı!');
            }else{
                return redirect('/register')->with('error','Kayıt oluşturulurken sıkıntı oluştu!')->withInput();
            }
        }
    }

    public function login(Request $request){
        
        if(empty($request->input('email'))||empty($request->input('password'))){
            return redirect('/login')->with('warning',"İlgili alanlar boş geçilemez!");
        }

        

        if ($users = User::where('email', '=', $request->input('email'))->where('password', '=', $request->input('password'))->first()) {
            return redirect('/')->with('success', 'Giriş Başarılı!');
        } else {
            return redirect('/login')->with('error', 'Email veya Şifre hatalı!')->withInput();
        }
    }
}
