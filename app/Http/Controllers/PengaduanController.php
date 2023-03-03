<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Alert;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Pengaduan::orderBy('created_at', 'ASC')->get();

        if (auth()->user()->role == 'Warga') {
            $pengaduan = $order->where('user_id', auth()->user()->id);
        }else{
            $pengaduan = Pengaduan::orderBy('created_at', 'ASC')->get();
        }
        
        return view('pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id', $request->id)->first();

        $mytime = Carbon::now();

        if ($pengaduan) {

            Alert::success('Berhasil Memperbarui Laporan');

            if (!$request->foto) {
                $img = $pengaduan->foto;;
            } else {

                // Storage::delete($foto);

                $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
                $request->foto->move(public_path('image'), $imgName);
                $img = $imgName;
            }

            $pengaduan->update([
                'tanggal_pengaduan' => $mytime,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $img,
                'status' => 'Pending',
            ]);

            return redirect()->route('pengaduan');
        } else {

            Alert::success('Berhasil Melaporkan');

            $this->validate($request, [
                'isi_laporan' => 'required',
                'foto' => 'required',
            ]);

            $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('image'), $imgName);

            Pengaduan::create([
                'user_id' => auth()->user()->id,
                'tanggal_pengaduan' => $mytime,
                'isi_laporan' => $request->isi_laporan,
                'foto' => $imgName,
                'status' => 'Pending',
            ]);

            return redirect('pengaduan');
        }
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'isi_laporan' => 'required',
            'foto' => 'required',
        ]);

        $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('image'), $imgName);

        $mytime = Carbon::now();

        Pengaduan::create([
            'user_id' => auth()->user()->id,
            'tanggal_pengaduan' => $mytime,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $imgName,
            'status' => 'Pending',
        ]);

        return redirect('pengaduan');

        // if ($validate) {
        // }else{
        //     return response()->json('gagal', 201);
        // }

        // Pengaduan::create($request->all());

        // return response()->json('sukses', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->get();
        // dd($pengaduan);
        $mytime = Carbon::now()->format('d/m/Y');
        // return response()->json($pengaduan);
        // dd($pengaduan);
        return view('pengaduan.show', compact('pengaduan', 'mytime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->get();
        return view('pengaduan.edit', compact('pengaduan'));
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
        Pengaduan::find('id', $id)->update($request->all());
        return redirect('pengaduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::warning('Success Title', 'Success Message');
        Pengaduan::where('id', $id)->delete();
        return redirect('pengaduan');
    }
}
