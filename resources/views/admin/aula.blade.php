@extends('admin/dashboard')

@section('adminKonten')
<div class="bg-white my-3 p-3">
<br>
    <h3>Aula</h3>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAulaTambah">
            Tambah Data
        </button>
    </div>

    <br>
    <div class="table-responsive">
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th align="center">No</th>
                <th align="center">User</th>
                <th align="center">Nama</th>
                <th align="center">No Telpon</th>
                <th align="center">Tanggal Pesan</th>
                <th align="center">Tanggal Sewa</th>
                <th align="center">Status</th>
                <th align="center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($aula as $index=>$a)
                <tr>
                    <td align="center" scope="row">{{ $index + $aula->firstItem() }}</td>
                    <td>{{$a->user->email}}</td>
                    <td>{{$a->nama}}</td>
                    <td>{{$a->no_telp}}</td>
                    <td>{{$a->tgl_pesan}}</td>
                    <td>{{$a->tgl_sewa}}</td>
                    <td>{{$a->status}}</td>

                    <td align="center">

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalAulaEdit{{$a->id_aula}}">
                            Edit
                        </button>

                        <div class="modal fade" id="modalAulaEdit{{$a->id_aula}}" tabindex="-1" role="dialog" aria-labelledby="modalAulaEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAulaEditLabel">Form Edit Data Aula</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formaulaedit" id="formaulaedit" action="{{ Route('aulaEdit', $a->id_aula)}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $a->user->id_user}}" @readonly(true)>
                                            <div class="form-group row text-start">
                                                <label for="user" class="col-sm-4 col-form-label">User</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="user" name="user" value="{{ $a->user->email}}" @readonly(true) required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $a->nama}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{ $a->no_telp}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="tgl_pesan" class="col-sm-4 col-form-label">Tanggal Pesan</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="{{ $a->tgl_pesan}}" @readonly(true) required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="tgl_sewa" class="col-sm-4 col-form-label">Tanggal sewa</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="tgl_sewa" name="tgl_sewa" value="{{ $a->tgl_sewa}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="status" class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="status" name="status" value="{{ $a->status}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="aulatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        |
                        <a href="{{ Route('aulaHapus', $a->id_aula)}}" onclick="return confirm('Yakin mau dihapus?')">
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


    {{ $aula->links() }}

    <div class="modal fade" id="modalAulaTambah" tabindex="-1" role="dialog" aria-labelledby="modalAulaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAulaTambahLabel">Form Input Data Aula</h5>
                </div>
                <div class="modal-body">

                    <form name="formaulatambah" id="formaulatambah" action="{{ Route('aulaTambah')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_user" class="col-sm-4 col-form-label">User</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_user" name="id_user" placeholder="Pilih email" required>
                                    <option @disabled(true)>Pilih Email</option>
                                    @foreach($user as $u)
                                        <option value="{{ $u->id_user }}">{{ $u->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="no_telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon" required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="tgl_pesan" class="col-sm-4 col-form-label">Tanggal Pesan</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="{{ date('Y-m-d') }}" readonly required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="tgl_sewa" class="col-sm-4 col-form-label">Tanggal Sewa</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_sewa" name="tgl_sewa" required>
                            </div>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="aulatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<br>
</div>
@endsection
