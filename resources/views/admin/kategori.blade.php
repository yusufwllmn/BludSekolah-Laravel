@extends('admin/dashboard')

@section('adminKonten')
<div class="bg-white my-3 p-3">
<br>
    <h3>Daftar Tempat</h3>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKategoriTambah">
            Tambah Data
        </button>
    </div>

    <br>
    <div class="table-responsive">
    <table class="table table-bordered table-striped text-center table">
        <thead class="thead-dark">
            <tr>
                <th align="center">No</th>
                <th align="center">Kode</th>
                <th align="center">Harga</th>
                <th align="center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($kategori as $index=>$kt)
                <tr>
                    <td align="center" scope="row">{{ $index + $kategori->firstItem() }}</td>
                    <td>{{$kt->kode}}</td>
                    <td>{{$kt->harga}}</td>
                    <td align="center">

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalKategoriEdit{{$kt->id_ktkantin}}">
                            Edit
                        </button>

                        <div class="modal fade" id="modalKategoriEdit{{$kt->id_ktkantin}}" tabindex="-1" role="dialog" aria-labelledby="modalKategoriEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalKategoriEditLabel">Form Edit Data Kategori</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formkategoriedit" id="formkategoriedit" action="{{ Route('kategoriEdit', $kt->id_ktkantin)}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row text-start">
                                                <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="kode" name="kode" value="{{ $kt->kode}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $kt->harga}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="kategoritambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        |
                        <a href="{{ Route('kategoriHapus', $kt->id_ktkantin)}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>


    {{ $kategori->links() }}

    <div class="modal fade" id="modalKategoriTambah" tabindex="-1" role="dialog" aria-labelledby="modalKategoriTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKategoriTambahLabel">Form Input Data Kategori</h5>
                </div>
                <div class="modal-body">

                    <form name="formkategoritambah" id="formkategoritambah" action="{{ Route('kategoriTambah')}} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukan Kode" required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukan Harga" required>
                            </div>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="kategoritambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>
</div>
@endsection
