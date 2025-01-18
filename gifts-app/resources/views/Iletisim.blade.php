<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BekGifts - Hakkımızda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img style="width: 150px;height: 150px;"
                src="/image/pngtree-blue-square-birthday-gift-box-sticker-png-image_2705165-Photoroom.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul style="margin-left: 50px;font-size: 25px;" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li style="margin-right: 50px;" class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Anasayfa</a>
                    </li>
                    <li style="margin-right: 50px;" class="nav-item">
                        <a class="nav-link" href="/hakkimizda">Hakkımızda</a>
                    </li>
                    <li style="margin-right: 50px;" class="nav-item">
                        <a class="nav-link" href="#">Ürünler</a>
                    </li>
                    <li style="margin-right: 50px;" class="nav-item">
                        <a class="nav-link" href="/iletisim">İletişim</a>
                    </li>
                </ul>
                <div style="margin-right: 300px;" class="d-flex">
                    <button style="margin-right: 30px;" class="btn btn-outline-success">Login</button>
                    <button class="btn btn-outline-primary">Register</button>
                </div>
            </div>
        </div>
    </nav>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>Bizimle iletişime geçin :)</h1>
            </div>
            <div class="col-md-12">
                <p style="font-size: 20px;">
                    Adres: Admin Mah. Admin Cad. Admin Sk. No:0/0 <br>
                    <br>
                    Telefon: (212) - 212 - 21 - 12<br>
                    <br>
                    Eposta: admin@admin.com<br>
                </p>
            </div>
            <div class="col-md-12 mb-5">
                <form action="#">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">İsim:</label>
                        <input class="form-control" type="text" id="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="surname">Soyisim:</label>
                        <input class="form-control" type="text" id="surname" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="email">E-posta:</label>
                        <input class="form-control" type="email" id="email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="description">Açıklama:</label>
                        <textarea class="form-control" id="description" rows="4" required></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Gönder</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>


<footer class="bg-light py-4 border-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h5>E-Posta</h5>
                <p class="mb-2">E-postanıza bildirim göndermemizi isterseniz ekleyiniz.</p>
                <form>
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="E-posta adresiniz" required>
                        <button class="btn btn-primary" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-center">
                <p class="mb-0">BekGifts© Tüm Hakları Saklıdır</p>
            </div>
            <div class="col-md-4 text-end">
                <img style="width: 40px;height: 40px;" src="/image/Ekran görüntüsü 2024-12-24 114415.png" href="#"
                    class="me-3">
                <i class="bi bi-instagram fs-4"></i>
                </img>
                <img style="width: 40px;height: 40px;" src="/image/Facebook_logo_(square).png" href="#" class="me-3">
                <i class="bi bi-twitter fs-4"></i>
                </img>
                <img style="width: 40px;height: 40px;" src="/image/images.png" href="#">
                <i class="bi bi-facebook fs-4"></i>
                </img>
            </div>
        </div>
    </div>
</footer>

</html>