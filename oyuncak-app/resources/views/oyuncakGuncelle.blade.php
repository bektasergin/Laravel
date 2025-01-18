<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyuncak Güncelleme Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('anasayfa')}}">Anasayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('oyuncakEkle')}}">Oyuncak Ekle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('oyuncakGuncelle')}}">Oyuncak Güncelle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('oyuncakSil')}}">Oyuncak Sil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <div class="container">
        <h1 class="mt-5">Oyuncak Güncelleme Formu</h1>
        <form action="/oyuncakGuncelle" method="POST">
            @csrf
            @method('PUT')
            <div class="row mt-5">
                <div class="col-md-12">
                    <label for="isim" class="form-label">İsim Giriniz:</label>
                    <input type="text" class="form-control" id="isim" name="isim">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label for="yeniIsim" class="form-label">Yeni İsim Giriniz:</label>
                    <input type="text" class="form-control" id="yeniIsim" name="yeniIsim">
                </div>
                <div class="col-md-6">
                    <label for="fiyat" class="form-label">Fiyat Giriniz:</label>
                    <input type="number" class="form-control" id="fiyat" name="fiyat">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-warning">Güncelle</button>
                </div>
            </div>
        </form>

        <div class="mt-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
        </div>
        @if(isset($oyuncaklar) && !$oyuncaklar->isEmpty())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">İsim</th>
                        <th scope="col">Fiyat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($oyuncaklar as $oyuncak)
                        <tr>
                            <td>{{ $oyuncak->id }}</td>
                            <td>{{ $oyuncak->isim }}</td>
                            <td>{{ $oyuncak->fiyat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Hiç oyuncak bulunamadı.</p>
        @endif

    </div>
</body>

</html>