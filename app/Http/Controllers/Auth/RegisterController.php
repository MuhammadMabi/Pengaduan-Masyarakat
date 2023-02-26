<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nik' => ['required'],
            'nama' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'telp' => ['required'],
            'jenis_kelamin' => ['required'],
            'role' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'rt' => ['required'],
            'rw' => ['required'],
            'kode_pos' => ['required'],
            'province_id' => ['required'],
            'regency_id' => ['required'],
            'district_id' => ['required'],
            'village_id' => ['required'],
        ]);

        // return Validator::make($data, [
        //     'nik' => ['required', 'string', 'max:20', 'unique:users'],
        //     'nama' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:5', 'confirmed'],
        //     'telp' => ['required', 'integer', 'max:20'],
        //     'jenis_kelamin' => ['required', 'string', 'max:150'],
        //     'role' => ['required', 'string', 'max:150'],
        //     'tanggal_lahir' => ['required', 'date'],
        //     'alamat' => ['required', 'text'],
        //     'rt' => ['required', 'string', 'max:50'],
        //     'rw' => ['required', 'string', 'max:50'],
        //     'kode_pos' => ['required', 'string', 'max:50'],
        //     'province_id' => ['required', 'string', 'max:50'],
        //     'regency_id' => ['required', 'string', 'max:50'],
        //     'district_id' => ['required', 'string', 'max:50'],
        //     'village_id' => ['required', 'string', 'max:50'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
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
    }
}
