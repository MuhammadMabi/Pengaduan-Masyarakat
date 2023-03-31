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
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function profile()
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

        return view('profile.profile', compact('province', 'regency', 'district', 'village', 'tanggapan', 'umur'));
    }


    public function index()
    {
        return view('profile.changepassword');
    }


    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:5|same:confirm_new_password',
            'confirm_new_password' => 'required',
        ]);

        $user = $request->User();

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            Alert::success('Password berhasil di update!');
            return redirect('dashboard');
        } else {
            Alert::error('Password lama salah');
            return back();
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required|min:16|max:20|unique:users,nik,' . auth()->user()->id,
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'telp' => 'required|max:20',
            'jenis_kelamin' => 'required',
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


    public function destroy($id)
    {
        Alert::success('Akun anda berhasil dihapus!');
        User::where('id', $id)->delete();
        Pengaduan::where('user_id', $id)->delete();
        Tanggapan::where('user_id', $id)->delete();
        return redirect('login');
    }
}
