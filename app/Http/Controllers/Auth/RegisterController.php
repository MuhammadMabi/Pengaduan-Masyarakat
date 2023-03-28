<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Province;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nik' => ['required', 'unique:users,nik', 'min:16', 'max:20'],
            'nama' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'max:255'],
            'password' => ['required', 'min:5', 'max:255', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'min:5', 'max:255'],
            'telp' => ['required', 'max:20', 'unique:users,telp'],
            'jenis_kelamin' => ['required'],
            'role' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'rt' => ['required', 'max:10'],
            'rw' => ['required', 'max:10'],
            'kode_pos' => ['required', 'max:10'],
            'province_id' => ['required'],
            'regency_id' => ['required'],
            'district_id' => ['required'],
            'village_id' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return $user = User::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'role' => $data['role'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'alamat' => $data['alamat'],
            'rt' => $data['rt'],
            'rw' => $data['rw'],
            'kode_pos' => $data['kode_pos'],
            'province_id' => $data['province_id'],
            'regency_id' => $data['regency_id'],
            'district_id' => $data['district_id'],
            'village_id' => $data['village_id'],
        ]);

        event(new Registered($user));

        // Auth::login($user);
    }
}
