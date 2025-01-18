@include('inc/header')
<style>
    #map {
        height: 500px;
        width: 100%;
    }
</style>

<div class="container" style="background-color:#f2a100; margin-top: 100px; height: 800px">

    <h1>Konum Seçimi ve Harita</h1>

    <form id="locationForm">
        <label for="destination">Konum Seçin:</label>
        <select id="destination">
            <option value="" disabled selected>Konum Seçin</option>
            <option value="39.92077,32.85411">Ankara</option>
            <option value="41.00824,28.97836">İstanbul</option>
            <option value="38.41925,27.12872">İzmir</option>
        </select>
        <button type="button" id="goButton">Git</button>
    </form>

    <div id="map"></div>

    <script>
        // Harita ve başlangıç koordinatları
        var map = L.map('map').setView([39.92077, 32.85411], 6); // İlk başlangıç noktası (Ankara)

        // OpenStreetMap katmanını ekle
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // Routing için değişken
        var control;

        // Kullanıcının mevcut konumu
        var userLocation = null;

        // Tarayıcıdan kullanıcının konumunu alma
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                userLocation = [position.coords.latitude, position.coords.longitude];

                // Kullanıcının bulunduğu yeri işaretle
                L.marker(userLocation).addTo(map)
                    .bindPopup("Şu an buradasınız.")
                    .openPopup();

                map.setView(userLocation, 10);
            });
        } else {
            alert("Tarayıcınız konum erişimini desteklemiyor.");
        }

        // "Git" butonuna tıklandığında
        document.getElementById('goButton').addEventListener('click', function () {
            var destination = document.getElementById('destination').value;

            if (!destination) {
                alert("Lütfen bir konum seçin!");
                return;
            }

            // Seçilen konumu enlem ve boylam olarak al
            var destCoords = destination.split(',');

            // Önceki rota kontrolünü temizle
            if (control) {
                map.removeControl(control);
            }

            // Yeni bir rota oluştur
            control = L.Routing.control({
                waypoints: [
                    L.latLng(userLocation[0], userLocation[1]), // Kullanıcının mevcut konumu
                    L.latLng(destCoords[0], destCoords[1])      // Hedef konum
                ],
                routeWhileDragging: true,
                show: true,
                createMarker: function (i, wp) {
                    return L.marker(wp.latLng, {
                        draggable: false
                    });
                }
            }).addTo(map);
        });
    </script>


</div>
@include('inc/footer')