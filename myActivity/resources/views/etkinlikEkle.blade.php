@include('inc/header')

<div class="container" style="background-color:#f2a100; margin-top: 100px; height: 800px">
    <form action="/pages/dashboard" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="mb-3 mt-4">
                <label for="etkinlikBaslik" class="form-label">Etkinlik Başlık</label>
                <input type="text" class="form-control" id="etkinlikBaslik" name="etkinlikBaslik">
            </div>
        </div>

        <div class="row">
            <div class="mb-3">
                <label for="etkinlikAciklama" class="form-label">Etkinlik Açıklama</label>
                <textarea class="form-control" id="etkinlikAciklama" rows="17" style="resize: none;" name="etkinlikAciklama"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
</div>

@include('inc/footer')