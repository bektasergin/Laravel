@extends('layouts.master')
@section('title', 'Anasayfa')

@section('content')
    @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif
<section class="container">
    @if(Session::get('user_name') !== null)
        <div class="alert alert-success">
            <h4 class="alert-heading">Başarılı!</h4>
            <p>Hoşgeldin {{ Session::get('user_name') }}</p>
        </div>
    @else
        <div class="row">
            <div class="box">
                <h1 class="box-title">Uygulamaya Hoşgeldiniz</h1>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="user">Kullanıcı Adı</label>
                        <input type="text" name="user" id="user" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Giriş Yap</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='/register'">Kayıt Ol</button>
                </form>
            </div>
        </div>
    @endif

</section>

@endsection
