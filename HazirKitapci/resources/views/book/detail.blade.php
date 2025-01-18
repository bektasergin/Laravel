<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Detay</title>
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
</head>

<body>

@include('layouts.header1')

    <div class="container mt-5" style="margin-left:30%;">
        <div class="row">
            <div class="col-md-12">
                <img style="margin-left:15%" src="{{ $book->image }}" alt="">
            </div>
        </div>
        <div class="row mt-3" style="margin-left:8%">
            <div class="col-md-3">
                <p style="font-size:25px;font-weight:bold">Kitabın İsmi:</p>
            </div>
            <div class="col-md-3">
                <p style="font-size:20px">{{ $book->title }}</p>
            </div>
        </div>
        <div class="row mt-3" style="margin-left:8%">
            <div class="col-md-3">
                <p style="font-size:25px;font-weight:bold">Kitabın Açıklaması:</p>
            </div>
            <div class="col-md-3">
                <p style="font-size:20px">{{ $book->description }}</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:200px">
        <form action="{{ route('addComment', $book->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label fs-5" for="comment">Yorum Yapınız:</label>
                    <input class="form-control" type="text" name="comment" id="comment" required>
                    <button type="submit" class="btn btn-success mt-3">Gönder</button>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Book Update</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label for="comments">Yeni Yorumunuz:</label>
                        <input type="text" name="comment" id="comment">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            @foreach($comments as $comment)
                <div class="row mt-5">
                    <div class="col-md-6 mb-3">
                        <p>{{ $comment->comment }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-comment="{{ $comment->comment }}" data-bs-id="{{ $comment->id }}">Update
                        </button>
                        <button onclick="DeleteComment('{{$comment->id}}')" class="btn btn-danger">Delete</button>
                    </div>
                </div>
                <div class="row">
                    <small>{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            @endforeach

        </div>
    </div>
    @include('layouts.footer1')

    <script>
        const exampleModal = document.getElementById('exampleModal');
        exampleModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const commentId = button.getAttribute('data-bs-id');
            const comment = button.getAttribute('data-bs-comment');

            const modal = this;
            modal.querySelector('form').action = `/book/detail/${commentId}`;
            modal.querySelector('input[name="comment"]').value = comment;
        });
    </script>
    
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
    <script>
        function DeleteComment(id) {
            Swal.fire({
                title: 'Emin misiniz?',
                text: "Bu işlem geri alınamaz!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, Sil!',
                cancelButtonText: 'Vazgeç'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/book/detail/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{csrf_token()}}'
                        },
                        success: function (response) {
                            if (response) {
                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Yorum başarıyla silindi",
                                    icon: "success"
                                }).then(function () {
                                    location.reload(); // Sayfayı yeniler
                                });
                            } else {
                                Swal.fire({
                                    title: "Başarısız",
                                    text: "Yorum silinirken bir hata oluştu",
                                    icon: "error"
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                title: "Hata",
                                text: "Beklenmeyen bir hata oluştu.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

    </script>

</body>

</html>