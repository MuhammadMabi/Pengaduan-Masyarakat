<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use App\Models\Province;
use Illuminate\Http\Request;
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
        $province = Province::all();
        $laporan = Pengaduan::count();
        $pending = Pengaduan::where('status', 'Pending')->count();
        $proses = Pengaduan::where('status', 'Proses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();

        return view('profile.profile', compact('province', 'laporan', 'pending', 'proses', 'selesai'));
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
            }else{
                $user->update([
                    'password' => Hash::make($request->new_password),
                ]);
    
                Alert::success('Password berhasil di update!');
                return redirect('dashboard');
            }
        }else{
            Alert::error('Password lama salah');
            return redirect()->back();
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
