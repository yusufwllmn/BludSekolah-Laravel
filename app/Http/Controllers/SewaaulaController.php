<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaaulaController extends Controller
{
    public function aulaTampil()
    {

        return view('customer.sewaAula',);
    }

    public function aulaTambah(Request $request)
    {
        $pesan = [
            'required' => ':attribute wajib diisi !',
        ];

        $this->validate($request, [
            'nama' => 'required',
            'telepon' => 'required',
            'tanggalPesan' => 'required',
            'tanggalSewa' => 'required',
        ],$pesan);

        Aula::create([
            'id_user' => Auth::user()->id_user,
            'nama' => $request->nama,
            'no_telp' => $request->telepon,
            'tgl_pesan' => $request->tanggalPesan,
            'tgl_sewa' => $request->tanggalSewa,
            'status' => 'Diproses'
        ]);

        return redirect('/customer/aula');
    }
}
