<?php

namespace App\Http\Controllers;

use App\Image;
use App\Kategori;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PengaduanController extends Controller
{

    public function index()
    {
        $order = Pengaduan::orderBy('created_at', 'DESC')->get();
        $kategori = Kategori::orderBy('kategori', 'ASC')->get();

        if (auth()->user()->role == 'Warga') {
            $pengaduan = $order->where('user_id', auth()->user()->id);
        } else {
            $pengaduan = $order;
        }

        return view('pengaduan.index', compact('pengaduan', 'kategori'));
    }


    public function create()
    {
        $kategori = Kategori::orderBy('kategori', 'ASC')->get();
        return view('pengaduan.create', compact('kategori'));
    }


    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id', $request->id)->first();

        $mytime = Carbon::now();

        if ($pengaduan) {

            Alert::success('Berhasil Memperbarui Laporan');

            $pengaduan->update([
                'kategori_id' => $request->kategori_id,
                'tanggal_pengaduan' => $mytime,
                'isi_laporan' => $request->isi_laporan,
            ]);

            return redirect()->route('pengaduan');
        } else {

            $table = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'pengaduan_masyarakat' AND TABLE_NAME = 'pengaduans'");

            $this->validate($request, [
                'kategori_id' => 'required',
                'isi_laporan' => 'required',
                'image' => 'required', 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png', 'max:255',
            ]);

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
                    'kategori_id' => $request->kategori_id,
                    'tanggal_pengaduan' => $mytime,
                    'jam_pengaduan' => $mytime,
                    'isi_laporan' => $request->isi_laporan,
                    'status' => 'Pending',
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);

                Alert::success('Berhasil Melaporkan');

                return redirect('pengaduan');
            } else {
                Alert::error('Foto lebih dari 5');
                return back();
            }
        }
    }


    public function uploadimage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required', 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png', 'max:255',
        ]);

        $reqfoto = $request->file('image');
        $oldfoto = Image::where('pengaduan_id', $request->pengaduan_id)->count();
        $maxfoto = count($reqfoto) + $oldfoto <= 5;

        if ($maxfoto) {

            if ($request->hasfile('image')) {
                foreach ($request->image as $file) {

                    $imgName = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
                    $file->move(public_path('image'), $imgName);

                    Image::insert([
                        'pengaduan_id' => $request->pengaduan_id,
                        'image' => $imgName,
                    ]);
                }
            }

            Alert::success('Berhasil Menambahkan Foto');

            return back();
        } else {
            Alert::error('Foto lebih dari 5');
            return back();
        }
    }


    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->first();
        $tanggapan = Tanggapan::where('pengaduan_id', $id)->first();
        $image = Image::where('pengaduan_id', $id)->get();
        $mytime = Carbon::now()->format('d/m/Y');

        return view('pengaduan.show', compact('pengaduan', 'mytime', 'image', 'tanggapan'));
    }


    public function destroyimage($id)
    {
        $image = Image::where('id', $id)->first();
        $image_path = "image/$image->image";

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $image->delete();

        Alert::success('Foto berhasil dihapus!');
        return back();
    }


    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->first();
        $kategori = Kategori::orderBy('kategori', 'ASC')->get();
        return view('pengaduan.edit', compact('pengaduan', 'kategori'));
    }


    public function destroy($id)
    {
        $image = Image::where('pengaduan_id', $id)->get();

        foreach ($image as $i) {
            $image_path = "image/$i->image";

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            Image::where('id', $i->id)->delete();
        }

        Pengaduan::where('id', $id)->delete();
        Tanggapan::where('pengaduan_id', $id)->delete();
        Alert::success('Data berhasil dihapus!');
        return redirect('pengaduan');
    }


    // Cetak Pengaduan

    public function cetakPengaduan()
    {
        $mytime = Carbon::now()->format('Y-m-d');

        return view('pengaduan.cetak', compact('mytime'));
    }


    public function cetakpdf($tanggal_awal, $tanggal_akhir)
    {
        $cetak = Pengaduan::whereBetween('tanggal_pengaduan', array($tanggal_awal, $tanggal_akhir))->get();

        if (auth()->user()->role == 'Warga') {
            $pengaduan = $cetak->where('user_id', auth()->user()->id);
        } else {
            $pengaduan = $cetak;
        }

        $pdf = \PDF::loadView('pengaduan.cetak-pengaduan', compact('pengaduan', 'tanggal_awal', 'tanggal_akhir'))->setPaper('a4');

        // return $pdf->download('document.pdf');
        return $pdf->stream('document.pdf');
    }
}
