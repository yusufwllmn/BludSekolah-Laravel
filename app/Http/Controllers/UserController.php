<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $datauser     = User::orderby('id_user', 'ASC')->paginate(10);

        return view('admin/user',['kantin'=>$datauser]);
    }

    public function userTambah(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return to_route('adminUser');
    }

    public function userEdit($id_user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $id_user = User::find($id_user);
        $id_user->nam      = $request->name;
        $id_user->email      = $request->email;
        $id_user->password      = $request->password;
        $id_user->role      = $request->role;

        $id_user->save();

        return redirect()->back();
    }

    public function userHapus($id_user)
    {
        $datauser=User::find($id_user);
        $datauser->delete();

        return redirect()->back();
    }
}
