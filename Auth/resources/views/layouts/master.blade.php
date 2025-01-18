<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'İSTİKA')</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
@include('layouts.menu')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger" style="background-color:red">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @yield('content')
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    @if(session('status'))
    Swal.fire({
        title: "{{session('status') == 'success' ? 'Başarılı' : 'Başarısız'}}",
        text: "{{session('message')}}",
        icon: "{{session('status')}}",
        confirmButtonText: 'Kapat'
    });
    @endif

    $(`.nav-link[href="${window.location.pathname}"]`).addClass('active');
</script>
@yield('js')
</body>
</html>
