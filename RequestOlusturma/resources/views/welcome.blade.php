<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">İSTKA Product Panel</h1>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <label for="productName" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="productName" placeholder="Ürün Adı" required>
                </div>
                <div class="col-md-12">
                    <label for="productDescription" class="form-label">Ürün Açıklaması </label>
                    <textarea class="form-control" id="productDescription" rows="3"
                        placeholder="Ürün Açıklaması"></textarea required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="productPrice" class="form-label">Ürün Fiyatı</label>
                        <input type="number" class="form-control" id="productPrice" rows="3"
                            placeholder="Ürün Fiyatı" required></input>
                    </div>
                    <div class="col-md-6">
                        <label for="productStock" class="form-label">Ürün Stoğu</label>
                        <input type="number" class="form-control" id="productStock" rows="3"
                            placeholder="Ürün Stoğu" required></input>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <button type="submit" id="addProduct" class="btn btn-primary">Ürün Ekle</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module">
        $(document).ready(function () {
            axios.get('/product/list',{
                headers: {
                    'Content-Type': 'application/json'
                    'Accept': 'application/json'
                }
            })
        }).then(function (response) {
            console.log(response);
        });
    </script>
</body>

</html>