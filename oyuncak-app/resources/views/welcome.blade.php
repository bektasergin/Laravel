<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyuncak Listesi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Oyuncak Listesi</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(isset($oyuncaklar) && $oyuncaklar->isEmpty())
            <p class="text-muted">Hiç oyuncak bulunamadı.</p>
        @elseif(isset($oyuncaklar))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Fiyat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($oyuncaklar as $oyuncak)
                        <tr>
                            <td>{{ $oyuncak->id }}</td>
                            <td>{{ $oyuncak->isim }}</td>
                            <td>{{ $oyuncak->fiyat }} ₺</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Hiçbir Veri Bulunmamaktadır!</p>
        @endif
        <div class="row mt-5">
            <div class="col-md-4">
                <form action="/oyuncakEkle" method="get">
                    @csrf
                    <button type="submit" class="btn btn-success">Oyuncak Ekle</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="/oyuncakGuncelle" method="get">
                    @csrf
                    <button type="submit" class="btn btn-warning">Oyuncak Güncelle</button>
                </form>
            </div>
            <div class="col-md-4">
                <form action="/oyuncakSil" method="delete">
                    @csrf
                    <button type="submit" class="btn btn-danger">Oyuncak Sil</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
