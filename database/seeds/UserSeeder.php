<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '1234567890111213',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2023-03-15 11:11:31',
            'password' => Hash::make('12345'),
            'telp' => '123456789011',
            'jenis_kelamin' => 'Laki-laki',
            'role' => 'Admin',
            'tanggal_lahir' => '2005-08-22',
            'alamat' => 'jl jcc pln',
            'rt' => '002',
            'rw' => '009',
            'kode_pos' => '16515',
            'province_id' => '32',
            'regency_id' => '3276',
            'district_id' => '3276060',
            'village_id' => '3276060004',
        ]);

        DB::table('users')->insert([
            'nik' => '1234567890111212',
            'nama' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => '2023-03-15 11:11:31',
            'password' => Hash::make('12345'),
            'telp' => '123456789011',
            'jenis_kelamin' => 'Laki-laki',
            'role' => 'Petugas',
            'tanggal_lahir' => '2005-08-22',
            'alamat' => 'jl jcc pln',
            'rt' => '002',
            'rw' => '009',
            'kode_pos' => '16515',
            'province_id' => '32',
            'regency_id' => '3276',
            'district_id' => '3276060',
            'village_id' => '3276060004',
        ]);
    }
}
