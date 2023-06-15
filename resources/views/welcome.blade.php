<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test FastPrint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 mb-4">
                    <button type="button" class="btn btn-success text-white" data-bs-toggle="modal"
                        data-bs-target="#tambahmodal">
                        Tambah Produk
                    </button>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th class="bg-dark text-white text-center">
                            ID Produk
                        </th>
                        <th class="bg-dark text-white text-center">
                            Nama Produk
                        </th>
                        <th class="bg-dark text-white text-center">
                            Harga
                        </th>
                        <th class="bg-dark text-white text-center">
                            Kategori
                        </th>
                        <th class="bg-dark text-white text-center">
                            Status
                        </th>
                        <th class="bg-dark text-white text-center">
                            Action
                        </th>
                    </tr>
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->id_produk }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->harga }}</td>
                            <td>{{ $produk->kategori }}</td>
                            <td>{{ $produk->status }}</td>
                            <td>
                                <a href="" class="btn btn-primary text-white mb-3" data-bs-toggle="modal"
                                    data-bs-target="#editmodal{{ $produk->id }}">
                                    Edit Produk
                                </a>
                                <a href="" class="btn btn-danger text-white" data-bs-toggle="modal"
                                    data-bs-target="#hapusmodal{{ $produk->id }}">
                                    Hapus Produk
                                </a>
                            </td>
                        </tr>
                        {{-- modal edit --}}
                        <div class="modal fade" id="editmodal{{ $produk->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('produk.update',$produk->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <label for="" class="form-label">ID Produk</label>
                                            <input required type="text" name="id_produk"
                                                value="{{ $produk->id_produk }}" class="form-control">
                                            <label for="" class="form-label">Nama Produk</label>
                                            <input required type="text" name="nama_produk"
                                                value="{{ $produk->nama_produk }}" class="form-control">
                                            <label for="" class="form-label">Harga Produk</label>
                                            <input required type="number" name="harga" value="{{ $produk->harga }}"
                                                class="form-control">
                                            <label for="" class="form-label">Kategori</label>
                                            <input required type="text" name="kategori"
                                                value="{{ $produk->kategori }}" class="form-control">
                                            <label for="" class="form-label">Status</label>
                                            <input required type="text" name="status" value="{{ $produk->status }}"
                                                class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-primary">Edit Produk</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal hapus --}}
                        <div class="modal fade" id="hapusmodal{{ $produk->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('produk.destroy',$produk->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <p><b>{{ $produk->nama_produk }}</b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus Produk</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk.store') }}" method="post">
                        @csrf
                        <label for="" class="form-label">ID Produk</label>
                        <input required type="number" name="id_produk" class="form-control">
                        <label for="" class="form-label">Nama Produk</label>
                        <input required type="text" name="nama_produk" class="form-control">
                        <label for="" class="form-label">Harga Produk</label>
                        <input required type="number" name="harga" class="form-control">
                        <label for="" class="form-label">Kategori</label>
                        <input required type="text" name="kategori" class="form-control">
                        <label for="" class="form-label">Status</label>
                        <input required type="text" name="status" class="form-control">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
