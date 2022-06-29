<html>
    <head>
        <title>Tambah Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="container position-center">
                {{-- <div class="row page-bg"> --}}
                    <div class="p-4">
                        <div class="text-center top-icon">
                            <br>
                            <center><h3>Tambah Buku</h3></center>
                            <br>
                            @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif

                            <form id="form-create" action="{{ route('books.new-data') }}" method="post">
                                @csrf
                                <div class="mt-3 mb-3 form-floating">
                                    <input type="text" class="form-control form-control-lg" name="title" placeholder="Judul Buku">
                                    <label for="title">Judul Buku</label>                                      
                                </div>

                                @error('title')
                                <div class="alert alert-danger"> Judul Buku Error </div>
                                @enderror

                                <div class="mt-3 mb-3 form-floating">
                                    <input type="text" class="form-control form-control-lg" name="slug" placeholder="Slug">
                                    <label for="slug">Slug Buku</label>                                      
                                </div>

                                @error('slug')
                                <div class="alert alert-danger"> Slug Buku Error </div>
                                @enderror

                                {{-- <div class="mt-3 mb-3 dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                      Kategori Buku
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                  </div> --}}


                                <select class="form-select" aria-label="Default select example" name="category_id">
                                    <option selected>Kategori Buku</option>
                                    @foreach($categories as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}
                                    @endforeach
                                </select>

                                {{-- <div class="mt-3 mb-3 form-floating">
                                    <input type="number" class="form-control form-control-lg" name="category_id" placeholder="1">
                                    <label for="category_id"> ID Kategori Buku</label>                                      
                                </div>

                                @error('category_id')
                                <div class="alert alert-danger"> ID Kategori Buku Error </div>
                                @enderror --}}

                                <div class="mt-3 mb-3 form-floating">
                                    <input type="text" class="form-control form-control-lg" name="author" placeholder="1">
                                    <label for="author"> Penulis Buku</label>                                      
                                </div>

                                @error('author')
                                <div class="alert alert-danger"> ID Penulis Buku Error </div>
                                @enderror

                            </form>
                            <br>
                            <div class="mt-4 text-center submit-btn">
                                <button type="submit" class="btn btn-primary" form="form-create">Tambah Buku</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


</html>