@include('inc/header')

<!-- Giriş başarılı uyarısı -->
@if(session('success'))
    <div class="alert alert-success" id="etkinlikler-alert">
        {{ session('success') }}
    </div>
@endif

<script>
    // Giriş başarılı uyarısını 2.5 saniye sonra gizle
    window.onload = function () {
        setTimeout(function () {
            document.getElementById('etkinlikler-alert').style.display = 'none';
        }, 2500);
    };
</script>
<div class="container" style="background-color:#f2a100; margin-top: 100px; height: 100%">
    @foreach ($etkinlikler as $etkinlik)
        <div class="row">
            <div class="col-md-2"></div>
            <div class="card mb-1 mt-5 col-md-8">
                <div class="card-body">
                    <p class="card-text" style="display: block">{{$etkinlik->tarih}}</p>
                    <!-- resources/views/show_image.blade.php -->
                    <img src="{{ route('etkinlik.image', ['id' => $etkinlik->id]) }}" alt="Etkinlik Resmi"
                        style="width: 100px; height: 100px;">
                    <h5 class="card-title" style="display: inline"><i><b>{{$etkinlik->etkinlikBaslik}}</b></i></h5>



                    <p class="card-text" style="display: block">{{$etkinlik->etkinlikAciklama}}</p> <br>
                    <p class="card-text" style="display: block">{{$etkinlik->etkinlikadi}}</p>

                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary">Düzenle</button>
                    <button class="btn btn-danger">Sil</button>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

    @endforeach


</div>
@include('inc/footer')