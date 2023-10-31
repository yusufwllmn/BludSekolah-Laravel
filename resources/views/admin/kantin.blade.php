@extends('admin/dashboard')

@section('adminKonten')
<div class="bg-white my-3 p-3">
<br>
    <h3>Kantin</h3>
    <div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKantinTambah">
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
                <th align="center">Kode</th>
                <th align="center">No Telepon</th>
                <th align="center">Tanggal Pesan</th>
                <th align="center">Awal Pesan</th>
                <th align="center">Akhir Pesan</th>
                <th align="center">Status</th>
                <th align="center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($kantin as $index=>$k)
                <tr>
                    <td align="center" scope="row">{{ $index + $kantin->firstItem() }}</td>
                    <td>{{$k->user->email}}</td>
                    <td>{{$k->nama}}</td>
                    <td>{{$k->kategori->kode}}</td>
                    <td>{{$k->no_telp}}</td>
                    <td>{{$k->tgl_pesan}}</td>
                    <td>{{$k->awal_pesan}}</td>
                    <td>{{$k->akhir_pesan}}</td>
                    <td>{{$k->status}}</td>

                    <td align="center">

                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalKantinEdit{{$k->id_kantin}}">
                            Edit
                        </button>

                        <div class="modal fade" id="modalKantinEdit{{$k->id_kantin}}" tabindex="-1" role="dialog" aria-labelledby="modalKantinEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalKantinEditLabel">Form Edit Data Kantin</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formkantinedit" id="formkantinedit" action="{{ Route('kantinEdit', $k->id_kantin)}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $k->user->id_user}}" @readonly(true)>
                                            <div class="form-group row text-start">
                                                <label for="user" class="col-sm-4 col-form-label">User</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="user" name="user" value="{{ $k->user->email}}" @readonly(true) required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $k->nama}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="kode" class="col-sm-4 col-form-label">Kode</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_ktkantin" name="id_ktkantin" placeholder="Pilih Kode" required>
                                                        <option @disabled(true)>Pilih Kode</option>
                                                        @foreach ($kategori as $kt)
                                                            @if ($k->id_ktkantin == $kt->id_ktkantin)
                                                                <option value="{{ $kt->id_ktkantin }}" selected>{{ $kt->kode }}</option>
                                                            @else
                                                                <option value="{{ $kt->id_ktkantin }}">{{ $kt->kode }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="no_telp" class="col-sm-4 col-form-label">No Telepon</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="no_telp" name="no_telp" value="{{ $k->no_telp}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="tgl_pesan" class="col-sm-4 col-form-label">Tanggal Sewa</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="{{ $k->tgl_pesan }}" @readonly(true) required>
                                                </div>
                                            </div>

                                            <br>
                                                @php
                                                    $awal = DateTime::createFromFormat('Y-m-d', $k->awal_pesan)->format('Y-m');
                                                @endphp
                                            <div class="form-group row text-start">
                                                <label for="awal_pesan" class="col-sm-4 col-form-label">Awal Sewa</label>
                                                <div class="col-sm-8">
                                                    <input type="month" class="form-control" required onchange="setAwalPesan('awal_pesan_edit', 'akhir_pesan_edit')" id="awal_pesan_edit" name="awal_pesan" value="{{ $awal }}">
                                                </div>
                                            </div>

                                            <br>
                                                @php
                                                    $akhir = DateTime::createFromFormat('Y-m-d', $k->akhir_pesan)->format('Y-m');
                                                @endphp
                                            <div class="form-group row text-start">
                                                <label for="akhir_pesan" class="col-sm-4 col-form-label">Akhir Sewa</label>
                                                <div class="col-sm-8">
                                                    <input type="month" class="form-control" id="akhir_pesan_edit" name="akhir_pesan" value="{{ $akhir}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row text-start">
                                                <label for="status" class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="status" name="status" value="{{ $k->status}}" required>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" name="kantintambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        |
                        <a href="{{ Route('kantinHapus', $k->id_kantin)}}" onclick="return confirm('Yakin mau dihapus?')">
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


    {{ $kantin->links() }}

    <div class="modal fade" id="modalKantinTambah" tabindex="-1" role="dialog" aria-labelledby="modalKantinTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKantinTambahLabel">Form Input Data Kantin</h5>
                </div>
                <div class="modal-body">

                    <form name="formkantintambah" id="formkantintambah" action="{{ Route('kantinTambah')}}" method="post" enctype="multipart/form-data">
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
                            <label for="id_ktkantin" class="col-sm-4 col-form-label">Kode</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_ktkantin" name="id_ktkantin" placeholder="Pilih Kode" required>
                                    <option @disabled(true)>Pilih Kode</option>
                                    @foreach($kategori as $k)
                                        <option value="{{ $k->id_ktkantin }}">{{ $k->kode }}</option>
                                    @endforeach
                                </select>
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
                            <label for="tgl_pesan" class="col-sm-4 col-form-label">Tanggal Sewa</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" value="{{ date('Y-m-d') }}" readonly required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="awal_pesan" class="col-sm-4 col-form-label">Awal Sewa</label>
                            <div class="col-sm-8">
                                <input type="month" class="form-control" onchange="setAwalPesan('awal_pesan', 'akhir_pesan')" id="awal_pesan" name="awal_pesan" required>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="akhir_pesan" class="col-sm-4 col-form-label">Akhir Sewa</label>
                            <div class="col-sm-8">
                                <input type="month" class="form-control" id="akhir_pesan" name="akhir_pesan" required>
                            </div>
                        </div>

                        <br>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="kantintambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setAwalPesan(id_awal, id_akhir){
            let awalPesan = document.getElementById(id_awal);
            let akhirPesan = document.getElementById(id_akhir);

            akhirPesan.min = awalPesan.value;
        }
    </script>
<br>
</div>
@endsection
