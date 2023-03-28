<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{

    public function index()
    {
        $get_user = User::orderBy('role', 'ASC');

        if (auth()->user()->role == 'Petugas') {
            $user = $get_user->where('role', 'Warga')->get();
        } else {
            $user = $get_user->get();
        }

        return view('user.index', compact('user'));
    }


    public function show($id)
    {
        $user = User::where('id', $id)->get();
        return view('user.show', compact('user'));
    }


    public function updateRole(Request $request, $id)
    {
        Alert::success('Berhasil Mengubah Role');

        $petugas = User::where('id', $id)->first();

        $petugas->update($request->all());
        return redirect()->back();
        // dd($petugas);
    }


    public function destroy($id)
    {
        Alert::success('Data berhasil dihapus');
        User::where('id', $id)->delete();
        Pengaduan::where('user_id', $id)->delete();
        Tanggapan::where('user_id', $id)->delete();
        return redirect()->back();
    }
}
