<?php

namespace App\Http\Controllers;

use App\Image;
use App\Kategori;
use App\Pengaduan;
use App\Tanggapan;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
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
        $auth = auth()->user();
        $lahir = $auth->tanggal_lahir;
        $mytime = Carbon::now()->format('Y');

        $umur = Carbon::parse($lahir)->age;
        $province = Province::all();
        $regency = Regency::where('province_id', $auth->province_id)->get();
        $district = District::where('regency_id', $auth->regency_id)->get();
        $village = Village::where('district_id', $auth->district_id)->get();

        $tanggapan = Tanggapan::where('user_id', auth()->user()->id)->count();
        $laporan = Pengaduan::where('user_id', auth()->user()->id)->count();
        $pending = Pengaduan::where('user_id', auth()->user()->id)->where('status', 'Pending')->count();
        $proses = Pengaduan::where('user_id', auth()->user()->id)->where('status', 'Proses')->count();
        $selesai = Pengaduan::where('user_id', auth()->user()->id)->where('status', 'Selesai')->count();
        
        $kategori = Kategori::orderBy('kategori', 'ASC')->get();

        return view('pengaduan.create', compact('kategori', 'province', 'regency', 'district', 'village', 'tanggapan', 'laporan', 'pending', 'proses', 'selesai', 'umur'));
    }


    public function createOrUpdate(Request $request)
    {
        $allowedfileExtension = ['image/jpg', 'image/jpeg', 'image/png'];
        $pengaduan = Pengaduan::where('id', $request->id)->first();
        $mytime = Carbon::now();

        if ($pengaduan) {

            $this->validate($request, [
                'kategori_id' => 'required',
                'isi_laporan' => 'required',
            ]);

            Alert::success('Berhasil Memperbarui Laporan');

            $pengaduan->update([
                'kategori_id' => $request->kategori_id,
                'tanggal_pengaduan' => $mytime,
                'isi_laporan' => $request->isi_laporan,
            ]);

            return redirect()->route('pengaduan');
        } else {

            $this->validate($request, [
                'kategori_id' => 'required',
                'isi_laporan' => 'required',
                'image' => 'required|max:255',
            ]);

            $table = DB::select("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'pengaduan-masyarakat-mabi' AND TABLE_NAME = 'pengaduans'");

            $maxfoto = $request->file('image');

            if (count($maxfoto) <= 5) {

                if ($request->hasfile('image')) {
                    foreach ($request->image as $file) {

                        $imgName = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
                        $file->move(public_path('image'), $imgName);

                        $extension = $file->getClientMimeType();
                        $check = in_array($extension, $allowedfileExtension);

                        if ($check) {
                            Image::insert([
                                'pengaduan_id' => $table[0]->AUTO_INCREMENT,
                                'image' => $imgName,
                            ]);
                        } else {
                            Alert::error('Gambar harus berupa file dengan tipe: png, jpg dan jpeg!');
                            return back();
                        }
                    }
                }

                Pengaduan::create([
                    'user_id' => auth()->user()->id,
                    'kategori_id' => $request->kategori_id,
                    'tanggal_pengaduan' => $mytime,
                    'jam_pengaduan' => $mytime,
                    'isi_laporan' => $request->isi_laporan,
                    'status' => 'Pending',
                    'latitude' => '-6.3481326',
                    'longitude' => '106.7843307',
                    // 'latitude' => $request->latitude,
                    // 'longitude' => $request->longitude,
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
            'image' => 'required|max:255',
        ]);
    
        $reqfoto = $request->file('image');
        $oldfoto = Image::where('pengaduan_id', $request->pengaduan_id)->count();
        $maxfoto = count($reqfoto) + $oldfoto <= 5;
    
        $allowedfileExtension = ['image/jpg', 'image/jpeg', 'image/png'];
    
        if ($maxfoto) {
    
            if ($request->hasfile('image')) {
    
                foreach ($request->image as $file) {
                    $imgName = $file->getClientOriginalName() . '-' . time() . '.' . $file->extension();
                    $file->move(public_path('image'), $imgName);
                    $data[] = $imgName;
    
                    $extension = $file->getClientMimeType();
                    $check = in_array($extension, $allowedfileExtension);
                }
    
                if ($check) {
    
                    foreach ($data as $d) {
                        Image::insert([
                            'pengaduan_id' => $request->pengaduan_id,
                            'image' => $d,
                        ]);
                    }
    
                    Alert::success('Berhasil Menambahkan Foto');
    
                    return back();
                } else {
                    Alert::error('Gambar harus berupa file dengan tipe: png, jpg dan jpeg!');
                }
            }
    
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


    public function cetak($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->first();
        $tanggapan = Tanggapan::where('pengaduan_id', $id)->first();
        $image = Image::where('pengaduan_id', $id)->get();
        $mytime = Carbon::now()->format('d/m/Y');

        return view('pengaduan.show-cetak', compact('pengaduan', 'mytime', 'image', 'tanggapan'));
        // $pdf = \PDF::loadView('pengaduan.show-cetak', compact('pengaduan', 'mytime', 'image', 'tanggapan'));

        // return $pdf->download('document.pdf');

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
        $pengaduan = Pengaduan::whereBetween('tanggal_pengaduan', array($tanggal_awal, $tanggal_akhir))->get();

        if ($pengaduan->all() != null) {

            $pdf = FacadePdf::loadView('pengaduan.cetak-pengaduan', compact('pengaduan', 'tanggal_awal', 'tanggal_akhir'));
            // $pdf = \PDF::loadView('pengaduan.cetak-pengaduan', compact('pengaduan', 'tanggal_awal', 'tanggal_akhir'));

            return $pdf->download('document.pdf');
            // return $pdf->stream('document.pdf');
        } else {
            Alert::error('Tidak ada data untuk di cetak!');
            return back();
        }
    }
}
