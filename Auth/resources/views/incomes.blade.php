@extends('layouts.master')
@section('title', 'Gelir Ekle')

@section('content')
    @if(isset($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif
    <section class="container">
        <div class="row">
            <div class="box">
                <form action="/save-income" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="income">Gelir</label>
                        <input type="number" step="0.01" name="income" id="income" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="surname">Kategorisi</label>
                        <select name="category" id="category" class="form-control">
                            <option value="Maaş">Maaş</option>
                            <option value="Kira">Kira</option>
                            <option value="Yatırım">Yatırım</option>
                            <option value="Diğer">Diğer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </form>
            </div>
        </div>
    </section>

@endsection
