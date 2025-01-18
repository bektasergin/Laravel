<p>Bu welcome.blade.php</p>
<p>HOŞ GELDİN</p>
@if($errors->any())
    <div class="alert alert-danger" style="background-color:red">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif