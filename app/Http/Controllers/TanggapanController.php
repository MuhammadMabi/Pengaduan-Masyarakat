<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TanggapanController extends Controller
{

    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id', $request->pengaduan_id)->first();

        $tanggapan = Tanggapan::where('pengaduan_id', $request->pengaduan_id)->first();
        
        $request['tanggal_tanggapan'] = Carbon::now();
        // dd($pengaduan->id, $tanggapan->id);

        $this->validate($request, [
            'pengaduan_id' => 'required',
            'tanggal_tanggapan' => 'required',
            'tanggapan' => 'required',
        ]);

        if ($tanggapan) {

            Alert::success('Success', 'Berhasil Memperbarui Tanggapan');
            $pengaduan->update([
                'status' => $request->status
            ]);


            $tanggapan->update($request->all());

            return redirect()->back();
        }else {

            Alert::success('Success', 'Berhasil Menaggapi');
            $pengaduan->update([
                'status' => $request->status
            ]);


            $request['user_id'] .= Auth::user()->id;

            Tanggapan::create($request->all());

            return redirect()->back();
        }

    }

}
