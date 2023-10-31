@extends('customer/dashboard')

@section('customerKonten')
<div class="p-5 my-5 shadow bg-white">
    <h4 class="text-center">Form Sewa Aula</h4>
    <hr>
    <form name="formaulatambah" id="formaulatambah" action="{{ Route('sewaaulaTambah')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label text-start">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" >
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="no_telp" class="col-sm-3 col-form-label text-start">Nomor Telepon</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="no_telp" name="telepon" placeholder="Masukan Nomor Telepon" >
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="tgl_pesan" class="col-sm-3 col-form-label text-start">Tanggal Pesan</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tgl_pesan" name="tanggalPesan" value="{{ date('Y-m-d') }}" readonly >
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="tgl_sewa" class="col-sm-3 col-form-label text-start">Tanggal Sewa</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tgl_sewa" name="tanggalSewa" >
            </div>
        </div>
        <hr>
        <div class="text-end">
            <button type="button" name="tutup" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modalVerifikasi">Ketentuan</button>
            <button type="submit" name="aulatambah" class="btn btn-success btn-lg" onclick="return confirm('Apakah data sudah benar?')">Sewa</button>
        </div>
    </form>

    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="modal fade " id="modalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="modalVerifikasiLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="modalVerifikasiLabel">Cara melakukan Sewa</h5>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>Isi semua data yang diperlukan</li>
                        <li>Klik tombol "Sewa" dan pastikan data telah terisi</li>
                        <li>Konfirmasi kembali apakah data sudah benar</li>
                        <li>Tunggu pesan lanjutan dari Admin mengenai transaksi anda atau dapat menguhubungi +62 XXX XXXX XXXX(Admin)</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" name="tutup" class="btn btn-primary" data-bs-dismiss="modal">Mengerti</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
