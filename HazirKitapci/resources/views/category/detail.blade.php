<!-- View (category/detail.blade.php) -->
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$category->name}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="/css/all.min.css">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="/css/animate.css">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="/css/meanmenu.css">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="/css/swiper-bundle.min.css">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="/css/nice-select.css">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="/css/icomoon.css">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="/css/main.css">

    @include('layouts.header1')
</head>

<body>
    <div class="container mt-5">
        @if($errors->any())
            <div class="alert alert-danger" style="background-color:red">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <h2>{{$category->name}}</h2>
            <hr>
            <h4>Kitaplar</h4>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        @foreach($category->books as $book)
                            <tr>
                                <td>{{$book->title}}</td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!--<< All JS Plugins >>-->
    <script src="/js/jquery-3.7.1.min.js"></script>
    <!--<< Viewport Js >>-->
    <script src="/js/viewport.jquery.js"></script>
    <!--<< Bootstrap Js >>-->
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!--<< Nice Select Js >>-->
    <script src="/js/jquery.nice-select.min.js"></script>
    <!--<< Waypoints Js >>-->
    <script src="/js/jquery.waypoints.js"></script>
    <!--<< Counterup Js >>-->
    <script src="/js/jquery.counterup.min.js"></script>
    <!--<< Swiper Slider Js >>-->
    <script src="/js/swiper-bundle.min.js"></script>
    <!--<< MeanMenu Js >>-->
    <script src="/js/jquery.meanmenu.min.js"></script>
    <!--<< Magnific Popup Js >>-->
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <!--<< Wow Animation Js >>-->
    <script src="/js/wow.min.js"></script>
    <!-- Gsap -->
    <script src="/js/gsap.min.js"></script>
    <!--<< Main.js >>-->
    <script src="/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        @if(session('status'))
            Swal.fire({
                title: "{{session('status') == 'success' ? 'Başarılı' : 'Başarısız'}}",
                text: "{{session('message')}}",
                icon: "{{session('status')}}",
                confirmButtonText: 'Kapat'
            });
        @endif
    </script>
    @include('layouts.footer1')


</body>

</html>