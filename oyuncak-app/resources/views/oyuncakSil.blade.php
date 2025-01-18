<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyuncak Silme Sayfası</title>
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
        <h1 class="mt-5">Oyuncak Silme Formu</h1>
        <form action="/oyuncakSil" method="POST">
            @csrf
            @method('DELETE')
            <div class="row mt-5">
                <div class="col-md-12">
                    <label for="id" class="form-label">Oyuncak ID:</label>
                    <input type="number" class="form-control" id="id" name="id" required>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-danger">Sil</button>
                </div>
            </div>
        </form>
        <div class="col-md-12 mt-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @elseif (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif
        </div>
    </div>
</body>

</html>