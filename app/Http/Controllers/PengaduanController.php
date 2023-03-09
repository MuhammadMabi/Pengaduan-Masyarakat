<?php

namespace App\Http\Controllers;

use App\Image;
use App\Models\Province;
use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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
        } else {
            $pengaduan = $order;
        }

        return view('pengaduan.index', compact('pengaduan'));
    }

    public function cetakPengaduan()
    {
        $order = Pengaduan::orderBy('created_at', 'ASC')->get();

        if (auth()->user()->role == 'Warga') {
            $pengaduan = $order->where('user_id', auth()->user()->id);
        } else {
            $pengaduan = $order;
        }

        return view('pengaduan.cetak-pengaduan', compact('pengaduan'));
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
                // 'foto' => $img,
                'status' => 'Pending',
            ]);

            return redirect()->route('pengaduan');
            
            // Alert::success('Berhasil Memperbarui Laporan');

            // $image = Image::where('pengaduan_id', $request->id)->get();
            // // dd($image);
            // foreach ($image as $i) {
            //     $foto = $i->image;
            // }

            // if (!$request->foto) {
            //     // $img = $foto;;
            // } else {

            //     // Storage::delete($foto);

            //     // $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
            //     // $request->foto->move(public_path('image'), $imgName);
            //     // $img = $imgName;

            //     if ($request->hasfile('image')) {
            //         foreach ($request->image as $file) {
    
            //             $imgName = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
            //             $file->move(public_path('image'), $imgName);
            //             $img = $imgName;

            //             // Image::insert([
            //             //     'pengaduan_id' => $table[0]->AUTO_INCREMENT,
            //             //     'image' => $imgName,
            //             // ]);
            //         }
            //     }
            // }

            // // Image::update($img);

            // Image::where('pengaduan_id', $request->id)->update([
            //     'image' => $img,
            // ]);

            // $pengaduan->update([
            //     'tanggal_pengaduan' => $mytime,
            //     'isi_laporan' => $request->isi_laporan,
            //     // 'foto' => $img,
            //     'status' => 'Pending',
            // ]);

            // return redirect()->route('pengaduan');
        } else {

            $table = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'pengaduan_masyarakat' AND TABLE_NAME = 'pengaduans'");

            $this->validate($request, [
                'isi_laporan' => 'required',
                'image' => 'required', 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png', 'max:255',
            ]);

            // $imgName = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();

            // $request->foto->move(public_path('image'), $imgName);

            $maxfoto = $request->file('image');

            if (count($maxfoto) <= 5) {

                if ($request->hasfile('image')) {
                    foreach ($request->image as $file) {
    
                        $imgName = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
                        $file->move(public_path('image'), $imgName);
    
                        Image::insert([
                            'pengaduan_id' => $table[0]->AUTO_INCREMENT,
                            'image' => $imgName,
                        ]);
                    }
                }

                Pengaduan::create([
                    'user_id' => auth()->user()->id,
                    'tanggal_pengaduan' => $mytime,
                    'isi_laporan' => $request->isi_laporan,
                    'status' => 'Pending',
                ]);

                Alert::success('Berhasil Melaporkan');
    
                return redirect('pengaduan');
            }else {
                Alert::error('Foto lebih dari 5');
                return back();
            }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->first();
        $image = Image::where('pengaduan_id', $id)->get();
        $mytime = Carbon::now()->format('d/m/Y');

        return view('pengaduan.show', compact('pengaduan', 'mytime', 'image'));
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
