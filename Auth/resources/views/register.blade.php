@extends('layouts.master')
@section('title', 'Kayıt Sayfası')

@section('content')
    <section class="container">
        <div class="row">
            <div class="box">
                <form action="/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Adınız</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="surname">Soyadınız</label>
                        <input type="text" name="surname" id="surname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">E-posta Adresiniz</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nickname">Kullanıcı Adı</label>
                        <input type="text" name="nickname" id="nickname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success" onclick="submitForm()">Kayıt Ol</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        function submitForm(){
            $.ajax({
                url:"proje.local/register",
                method:"post",
                data: {
                    "name": $("#name").val(),
                    "surname": $("#surname").val(),
                    "email": $("#email").val(),
                    "nickname":$("#nickname").val(),
                    "password": $("#password").val(),
                    "_token": $('input[name="_token"]').val()

                },
                dataType:"json",
                success: function (response){
                    if(response.success){
                        $('#message').html("<p style='color:green'>"+ response.message+"</p>");
                    }
                    else{
                        $('#message').html("<p style='color:red'>"+response.message+"</p>");
                    }
                },
                error: function(xhr, status, error) {
                    let errormessage="<p style='color:red;'>Bir hata oluştu: " + error + "</p>";
                    $('#message').html(errormessage);
                }
            });
        }
    </script>
@endsection