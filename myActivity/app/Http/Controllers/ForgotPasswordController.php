<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Users; // Corrected: Users to User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'E-posta adresi boş bırakılamaz.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'email.exists' => 'Bu e-posta adresi sistemde kayıtlı değil.',
        ]);

        $email = $request->input('email');
        $resetCode = random_int(100000, 999999);

        // Reset kodunu session'a kaydediyoruz
        Session::put('reset_code', $resetCode);
        Session::put('reset_email', $email);

        // E-postayı gönderiyoruz
        Mail::raw("Şifre sıfırlama kodunuz: $resetCode", function ($message) use ($email) {
            $message->to($email)
                ->subject('Şifre Sıfırlama Kodu');
        });

        return redirect('/reset-password');
    }

    public function showResetPasswordForm()
    {
        return view('reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'code' => 'required|integer',
            'password' => 'required|min:6|confirmed',
        ], [
            'code.required' => 'Kod alanı boş bırakılamaz.',
            'password.required' => 'Şifre alanı boş bırakılamaz.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
        ]);

        $resetCode = Session::get('reset_code');
        $resetEmail = Session::get('reset_email');

        if (!$resetCode || !$resetEmail) {
            return back()->withErrors(['code' => 'Sıfırlama kodu süresi dolmuş.']);
        }

        if ($resetCode != $request->input('code')) {
            return back()->withErrors(['code' => 'Sıfırlama kodu hatalı.']);
        }

        // Kullanıcının e-posta adresine göre userID yerine id'yi kullan
        $user = Users::where('email', $resetEmail)->first();
        if (!$user) {
            return back()->withErrors(['code' => 'Bu e-posta adresi sistemde kayıtlı değil.']);
        }

        // Şifre doğrudan kaydedilecek
        $user->password = $request->input('password');
        $user->save();

        Session::forget('reset_code');
        Session::forget('reset_email');

        return redirect('/login')->with('success', 'Şifreniz başarıyla güncellendi.');
    }



}
