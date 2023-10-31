@extends('customer/dashboard')

@section('customerKonten')
<div class="p-5 my-5 shadow bg-white">
    <h4 class="text-center">Form Sewa Kantin</h4>
    <hr>
    <form name="formkantintambah" id="formkantintambah" action="{{ Route('sewakantinTambah')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label text-start">Nama</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="id_ktkantin" class="col-sm-3 col-form-label text-start">Kode</label>
            <div class="col-sm-9">
                <select type="text" class="form-control" id="id_ktkantin" name="kode" placeholder="Pilih Kode">
                    <option @disabled(true)>Pilih Kode</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id_ktkantin }}">{{ $k->kode }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="no_telp" class="col-sm-3 col-form-label text-start">Nomor Telepon</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="no_telp" name="telepon" placeholder="Masukan Nomor Telepon">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="tgl_pesan" class="col-sm-3 col-form-label text-start">Tanggal Sewa</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" id="tgl_pesan" name="tanggalPesan" value="{{ date('Y-m-d') }}" readonly>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="awal_pesan" class="col-sm-3 col-form-label text-start">Awal Sewa</label>
            <div class="col-sm-9">
                <input type="month" class="form-control" id="awal_pesan" onchange="setAwalPesan('awal_pesan', 'akhir_pesan')" name="awalPesan">
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="akhir_pesan" class="col-sm-3 col-form-label text-start">Akhir Sewa</label>
            <div class="col-sm-9">
                <input type="month" class="form-control" id="akhir_pesan" name="akhirPesan">
            </div>
        </div>
        <hr>
        <div class="text-end">
            <button type="button" name="tutup" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modalDenah">Denah</button>
            <button type="button" name="tutup" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modalVerifikasi">Ketentuan</button>
            <button type="submit" name="kantintambah" class="btn btn-success btn-lg" onclick="return confirm('Apakah data sudah benar?')">Sewa</button>
        </div>
    </form>

    <script>
        function setAwalPesan(id_awal, id_akhir){
            let awalPesan = document.getElementById(id_awal);
            let akhirPesan = document.getElementById(id_akhir);

            akhirPesan.min = awalPesan.value;
        }
    </script>

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
                        <li>Pilih Kode sesuai dengan denah yang telah disediakan pada tombol "Denah" </li>
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

    <div class="modal fade " id="modalDenah" tabindex="-1" role="dialog" aria-labelledby="modalDenahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDenahLabel">Denah Kantin</h5>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('gambar/denah.png') }}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="modal-footer">
                    <button type="button" name="tutup" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
