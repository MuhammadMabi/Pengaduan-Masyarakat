<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggapan = Tanggapan::all();
        return view('tanggapan.index', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tanggapan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

            $pengaduan->update([
                'status' => $request->status
            ]);


            $tanggapan->update($request->all());

            return redirect()->back();
        }else {

            $pengaduan->update([
                'status' => $request->status
            ]);


            $request['user_id'] .= Auth::user()->id;

            Tanggapan::create($request->all());

            return redirect()->back();
        }

        

        // $request['user_id'] .= Auth::user()->id;

        // Tanggapan::create($request->all());

        // return redirect('tanggapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tanggapan = Tanggapan::where('id', $id)->first();
        return view('tanggapan.show', compact('tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanggapan = Tanggapan::where('id', $id)->first();
        return view('tanggapan.edit', compact('tanggapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tanggapan::find('id', $id)->update($request->all());
        return view('tanggapan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tanggapan::where('id', $id)->delete();
        return redirect('tanggapan');
    }
}
