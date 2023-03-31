<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Mail\TanggapanEmail;
use Illuminate\Support\Facades\Mail;

class TanggapanController extends Controller
{

    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id', $request->pengaduan_id)->first();
        // dd($pengaduan->user->email);

        $tanggapan = Tanggapan::where('pengaduan_id', $request->pengaduan_id)->first();
        
        $request['tanggal_tanggapan'] = Carbon::now();

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

            $request['user_id'] .= Auth::user()->id;

            $tanggapan->update($request->all());
            
            Mail::to($pengaduan->user->email)->send(new TanggapanEmail());
            return redirect('pengaduan');
        }else {

            Alert::success('Success', 'Berhasil Menaggapi');
            $pengaduan->update([
                'status' => $request->status
            ]);


            $request['user_id'] .= Auth::user()->id;

            Tanggapan::create($request->all());

            Mail::to($pengaduan->user->email)->send(new TanggapanEmail());
            return redirect('pengaduan');
        }

    }

}
