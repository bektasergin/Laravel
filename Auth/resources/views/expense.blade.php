@extends('layouts.master')
@section('title', 'Gider Ekle')

@section('content')
    <section class="container">
        <div class="row">
            <div class="box">
                <form action="/add-expense" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="amount">Harcanan Miktar</label>
                        <input type="number" step="0.01" name="amount" id="amount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="surname">Harcama Kategorisi</label>
                        <select name="category" id="category" class="form-control">
                            <option value="Gıda">Gıda</option>
                            <option value="Eğlence">Eğlence</option>
                            <option value="Ulaşım">Ulaşım</option>
                            <option value="Fatura">Fatura</option>
                            <option value="Diğer">Diğer</option>
                        </select>
                    </div>
                    <div type="submit" class="btn btn-success" onclick="submitForm()">Kaydet</div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <table class="table table-responsive list">
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
    </section>
    <script>
        function submitForm() {
            $.ajax({
                url: "/add-expense",
                method: "POST",
                data: {
                    amount: $('#amount').val(),
                    category: $('#category').val(),
                    _token: $('input[name="_token"]').val()
                },
                success: res => {
                    if (res.status === 'success') {
                        $('#amount').val('');
                        $('#category').val('');
                        function dateConverter(date) {
                            var splitDate = new Date(date).toLocaleDateString('tr-TR');
                            let [day, month, year] = splitDate.split('.');
                            return `${day}-${month}-${year}`;
                        }
                        $('.list').append(`
                            <tr>
                                <td>${dateConverter(res.data.created_at)}</td>
                                <td>${res.data.amount}</td>
                                <td>${res.data.category}</td>
                            </tr>
                        `);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: res.message,
                            text: res.data,
                            confirmButtonText: 'Tamam'
                        });
                    }
                },
                error: err => {
                    showPageLoader("remove");
                    console.log(err)
                    Swal.fire({
                        icon: "error",
                        title: "Bir hata ile karşılaşıldı!",
                        confirmButtonText: "Tamam"
                    });
                }
            });
        }
    </script>
@endsection
