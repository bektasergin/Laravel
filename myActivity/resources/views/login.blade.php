@include('inc/header')

<div class="container" style="background-color:#f2a100; margin-top: 100px; height: 800px">
    <div class="row align-items-center" style="height: 100%;">
        <div class="col-md-6 offset-md-3">
            <h1>Giriş Ekranı</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <label class="form-label" for="password">Şifre:</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-success">Giriş</button>
                    </div>
                </div>
            </form>
            <div class="row mb-3">
                <div class="col-md-6 text-center">
                    <a href="{{ route('register') }}" class="btn btn-primary">Kayıt Ol</a>
                </div>
                <div class="col-md-6 text-center">
                    <a href="{{ route('forgot-password') }}" class="btn btn-danger">Şifremi Unuttum!</a>
                </div>
            </div>
            <div class="row">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@include('inc/footer')