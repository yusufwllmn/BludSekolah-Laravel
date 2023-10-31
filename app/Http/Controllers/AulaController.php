<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\User;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function aulaTampil()
    {
        $dataaula = Aula::orderby('id_aula', 'ASC')->paginate(10);
        $datauser    = User::all();

        return view('admin.aula',['aula'=>$dataaula, 'user'=>$datauser]);
    }

    public function aulaTambah(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'tgl_pesan' => 'required',
            'tgl_sewa' => 'required',
        ]);

        Aula::create([
            'id_user' => $request->id_user,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'tgl_pesan' => $request->tgl_pesan,
            'tgl_sewa' => $request->tgl_sewa,
            'status' => 'Diproses'
        ]);

        return redirect('/admin/aula');
    }

    public function aulaEdit($id_aula, Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
            'tgl_pesan' => 'required',
            'tgl_sewa' => 'required',
            'status' => 'required'
        ]);

        $id_aula = Aula::find($id_aula);
        $id_aula->id_user   = $request->id_user;
        $id_aula->nama      = $request->nama;
        $id_aula->no_telp   = $request->no_telp;
        $id_aula->tgl_pesan = $request->tgl_pesan;
        $id_aula->tgl_sewa  = $request->tgl_sewa;
        $id_aula->status    = $request->status;

        $id_aula->save();

        return redirect()->back();
    }

    public function aulaHapus($id_aula)
    {
        $dataaula=Aula::find($id_aula);
        $dataaula->delete();

        return redirect()->back();
    }
}
