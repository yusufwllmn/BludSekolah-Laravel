<?php

namespace App\Http\Controllers;

use App\Models\Kantin;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class KantinController extends Controller
{
    public function kantinTampil()
    {
        $datakantin     = Kantin::orderby('id_kantin', 'ASC')->paginate(10);
        $datakategori   = Kategori::all();
        $datauser       = User::all();

        return view('admin/kantin',['kantin'=>$datakantin, 'kategori'=>$datakategori, 'user'=>$datauser]);
    }

    public function kantinTambah(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'id_ktkantin' => 'required',
            'no_telp' => 'required',
            'tgl_pesan' => 'required',
            'awal_pesan' => 'required',
            'akhir_pesan' => 'required',
        ]);

        Kantin::create([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'id_ktkantin' => $request->id_ktkantin,
            'no_telp' => $request->no_telp,
            'tgl_pesan' => $request->tgl_pesan,
            'awal_pesan' => $request->awal_pesan . '-01',
            'akhir_pesan' => $request->akhir_pesan. '-01',
            'status' => 'Diproses'
        ]);

        return redirect('admin/kantin');
    }

    public function kantinEdit($id_kantin, Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'id_ktkantin' => 'required',
            'no_telp' => 'required',
            'tgl_pesan' => 'required',
            'awal_pesan' => 'required',
            'akhir_pesan' => 'required',
            'status' => 'required'
        ]);

        $id_kantin = Kantin::find($id_kantin);
        $id_kantin->id_user   = $request->id_user;
        $id_kantin->nama      = $request->nama;
        $id_kantin->id_ktkantin      = $request->id_ktkantin;
        $id_kantin->no_telp      = $request->no_telp;
        $id_kantin->tgl_pesan      = $request->tgl_pesan;
        $id_kantin->awal_pesan      = $request->awal_pesan. '-01';
        $id_kantin->akhir_pesan      = $request->akhir_pesan. '-01';
        $id_kantin->status      = $request->status;

        $id_kantin->save();

        return redirect()->back();
    }

    public function kantinHapus($id_kantin)
    {
        $datakantin=Kantin::find($id_kantin);
        $datakantin->delete();

        return redirect()->back();
    }
}
