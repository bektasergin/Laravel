<nav class="navbar navbar-expand-sm bg-primary navbar-dark  mb-3">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Anasayfa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list">Harcama Listesi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add-income">Gelir Ekle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add-expense">Gider Ekle</a>
            </li>
        </ul>
    </div>
    @if(Session::get('user_name') !== null)
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" onclick="dropdownToggle()">
                {{ Session::get('user_name') }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/logout">Çıkış Yap</a>
            </div>
        </div>
    @endif
</nav>
<script>
    function dropdownToggle() {
        console.log(1);
        $('#dropdownMenuButton').dropdown('toggle');
    }
</script>


