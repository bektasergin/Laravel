@extends('layouts.master')
@section('title', 'Listeleme Sayfası')

@section('content')
    @if(isset($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif
    <section class="container">
        <div class="row">
            <div class="box">
                <table class="table table-responsive">
                    <tr>
                        <th>Harcanan Tarih</th>
                        <th>Harcanan Miktar</th>
                        <th>Harcanan Kategori</th>
                    </tr>
                    @foreach($expenses as $expense)
                        <tr>
                            <td>{{ date('d-m-Y',strtotime($expense->created_at)) }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->category }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <table class="table table-responsive">
                    <tr>
                        <th>Tarih</th>
                        <th>Gelir</th>
                        <th>Kategori</th>
                    </tr>
                    @foreach($incomes as $income)
                        <tr>
                            <td>{{ date('d-m-Y',strtotime($income->created_at)) }}</td>
                            <td>{{ $income->income }}</td>
                            <td>{{ $income->category }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
@endsection
