<?php

namespace App\Http\Controllers;

use App\Models\Kantin;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewakantinController extends Controller
{
    public function kantinTampil(){

        $datakategori   = Kategori::all();

        return view('customer.sewaKantin',['kategori'=>$datakategori]);
    }

    public function kantinTambah(Request $request)
    {
        $pesan = [
            'required' => ':attribute wajib diisi !',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'kode' => 'required',
            'telepon' => 'required',
            'tanggalPesan' => 'required',
            'awalPesan' => 'required',
            'akhirPesan' => 'required',
        ],$pesan);

        Kantin::create([
            'id_user' => Auth::user()->id_user,
            'nama' => $request->nama,
            'id_ktkantin' => $request->kode,
            'no_telp' => $request->telepon,
            'tgl_pesan' => $request->tanggalPesan,
            'awal_pesan' => $request->awalPesan . '-01',
            'akhir_pesan' => $request->akhirPesan. '-01',
            'status' => 'Diproses'
        ]);

        return redirect('customer/kantin');
    }
}
