<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategoriTampil()
    {
        $datakategori = Kategori::orderby('id_ktkantin', 'ASC')->paginate(10);

        return view('admin/kategori',['kategori'=>$datakategori]);
    }

    public function kategoriTambah(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'harga' => 'required',
        ]);

        Kategori::create([
            'kode' => $request->kode,
            'harga' => $request->harga
        ]);

        return redirect('/admin/kategori');
    }

    public function kategoriEdit($id_ktkantin, Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'harga' => 'required'
        ]);

        $id_ktkantin = Kategori::find($id_ktkantin);
        $id_ktkantin->kode   = $request->kode;
        $id_ktkantin->harga      = $request->harga;

        $id_ktkantin->save();

        return redirect()->back();
    }

    public function kategoriHapus($id_ktkantin)
    {
        $datakategori=Kategori::find($id_ktkantin);
        $datakategori->delete();

        return redirect()->back();
    }
}
