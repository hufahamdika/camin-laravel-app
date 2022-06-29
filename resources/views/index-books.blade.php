<html>
    <head>
        <title>Daftar Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="container">
            <br>
            <center><h3>Daftar Buku</h3></center>
            <br>
            <center><a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Create Buku</a></center>
            <br>
            @if (Session::has('tambah_data'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                        {{-- Penambahan Pengumuman Berhasil --}}
                        {{ Session::get('tambah_data') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
                    </button>
                </div>
            @endif

            @if (Session::has('edit_data'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                        {{ Session::get('edit_data') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif

            @if (Session::has('hapus_data'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                    <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                    <br>
                        {{ Session::get('hapus_data') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
            @endif
            <table class="table table-hover" style="width: 100%">
                <thead>
                <tr>
                    <th scope="col" style="width: 10%">Nomor Buku</th>
                    <th scope="col" style="width: 20%">Judul Buku</th>
                    <th scope="col" style="width: 20%">Kategori</th>
                    <th scope="col" style="width: 20%">Penulis</th>
                    <th scope="col" style="width: 30%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php
                 $it = 1; 
                @endphp

                @foreach ($books as $b)
                <tr>
                    <th scope="row">{{ $it }}</th>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->category->name }}</td>
                    <td>{{ $b->author->name }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah yakin ingin menghapus data?');" action="{{ route('books.destroy', $b->slug) }}" method="POST">
                            <a href="{{ route('books.edit', $b->slug) }}" class="btn btn-primary btn-sm shadow"><i class="fa-solid fa-pen-fancy"></i> Edit</a>
                            |
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            |
                            <a href="{{ route('books.show', $b->slug) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-circle-info"></i> Show</a>
                        </form>
                    </td>
                </tr>
                @php
                    $it+=1;
                @endphp
                @endforeach
            
                </tbody>
            </table>
        </div>
    </body>


</html>