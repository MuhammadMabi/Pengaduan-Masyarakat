<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }


    public function createOrUpdate(Request $request)
    {
        $kategori = Kategori::where('id', $request->id)->first();

        if ($kategori) {

            $this->validate($request, [
                'kategori' => 'required'
            ]);

            Kategori::where('id', $request->id)->update([
                'kategori' => $request->kategori,
            ]);

            Alert::success('Berhasil Memperbarui Kategori');

            return redirect('kategori');
        } else {

            $this->validate($request, [
                'kategori' => 'required'
            ]);

            Kategori::create([
                'kategori' => $request->kategori,
            ]);

            Alert::success('Berhasil Menambahkan Kategori');

            return redirect('kategori');
        }
    }


    public function edit($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        return view('kategori.edit', compact('kategori'));
    }


    public function destroy($id)
    {
        Alert::success('Data berhasil dihapus!');
        Kategori::where('id', $id)->delete();
        return redirect('kategori');
    }
}
