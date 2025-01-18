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

    <div class="row">
        <div class="col-md-12 mb-3 mt-5">
            <form action="/book/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFile" class="form-label">Book Cover</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categories</label>
                    <select class="form-select" name="category_id" id="category_id" required>
                        <option value="">---Select----</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Book Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Add Book</button>
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
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Book Cover</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Name</label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Categories</label>
                                <select class="form-select" name="category_id" id="category_id" required>
                                    <option value="">---Select----</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Book Description</label>
                                <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            @foreach($books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img style="with: 300px; height: 300px" src="{{ $book->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a style="text-decoration: none;font-size:25px" href="/book/detail/{{ $book->id}}" class="card-title">{{ $book->title }}</a><br>
                            <a style="text-decoration: none" href="/category/{{ $book->category_id }}" class="card-text">{{ $book->category->name }}</a>
                            <p class="card-text">{{ substr($book->description, 0, 100) }}...</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-id="{{ $book->id }}" data-title="{{ $book->title }}"
                                    data-category="{{ $book->category_id }}"
                                    data-description="{{ $book->description }}">Update
                                </button>
                                
                               
                                <button onclick="DeleteBook('{{ $book->id }}')" class="btn btn-danger">Delete</button>
                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    const exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const bookId = button.getAttribute('data-id');
        const bookTitle = button.getAttribute('data-title');
        const bookCategory = button.getAttribute('data-category');
        const bookDescription = button.getAttribute('data-description');

        const modal = this;
        modal.querySelector('form').action = `/book/update/${bookId}`;
        modal.querySelector('input[name="title"]').value = bookTitle;
        modal.querySelector('select[name="category_id"]').value = bookCategory;
        modal.querySelector('textarea[name="description"]').value = bookDescription;
    });

    function DeleteBook(id) {
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
                    url: '/book/delete/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response) {
                            Swal.fire({ title: "Başarılı", text: "Kitap başarıyla silindi", icon: "success" })
                                .then(function () {
                                    location.reload();
                                });
                        } else {
                            Swal.fire({ title: "Başarısız", text: "Kitap silinirken bir hata oluştu", icon: "error" });
                        }

                    }
                });
            }
        });
    }

</script>

<script>
    @if(session('status'))
        Swal.fire({
            title: "{{ session('status') == 'success' ? 'Başarılı' : 'Başarısız' }}",
            text: "{{ session('message') }}",
            icon: "{{ session('status') }}",
            confirmButtonText: 'Kapat'
        });
    @endif
</script>