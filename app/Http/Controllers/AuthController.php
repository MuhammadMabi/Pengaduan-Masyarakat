<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use App\Tanggapan;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $auth = auth()->user();
        // $lahir = $auth->tanggal_lahir->format('Y');
        // $mytime = Carbon::now()->format('Y');

        // dd($mytime - $lahir);
        // $umur = $mytime - $lahir;

        $province = Province::all();
        $regency = Regency::where('province_id', $auth->province_id)->get();
        $district = District::where('regency_id', $auth->regency_id)->get();
        $village = Village::where('district_id', $auth->district_id)->get();
        // dd($regency);

        $laporan = Pengaduan::count();
        $pending = Pengaduan::where('status', 'Pending')->count();
        $proses = Pengaduan::where('status', 'Proses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();

        return view('profile.profile', compact('province', 'regency', 'district', 'village', 'laporan', 'pending', 'proses', 'selesai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.changepassword');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        $user = $request->User();

        if (Hash::check($request->old_password, $user->password)) {
            if ($validator->fails()) {
                Alert::error('Password baru dan confirm password baru tidak sama');
                return redirect()->back();
            } else {
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);

                Alert::success('Password berhasil di update!');
                return redirect('dashboard');
            }
        } else {
            Alert::error('Password lama salah');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required|min:16|max:20|unique:users,nik,'.auth()->user()->id,
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            // 'password' => 'required|min:5|max:255',
            // 'confirmpassword' => 'required|min:5|max:255|same:password',
            'telp' => 'required|max:20',
            'jenis_kelamin' => 'required',
            // 'role' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'rt' => 'required|max:10',
            'rw' => 'required|max:10',
            'kode_pos' => 'required|max:10',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]);

        User::find(auth()->user()->id)->update($request->all());

        Alert::success('Profile berhasil di update!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        Pengaduan::where('user_id', $id)->delete();
        Tanggapan::where('user_id', $id)->delete();
        return redirect('login');
        Alert::success('Akun anda berhasil dihapus!');
    }
}
