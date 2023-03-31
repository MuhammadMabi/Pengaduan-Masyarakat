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
            'nik' => '1234567890111111',
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2023-03-30 11:11:31',
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
            'nik' => '1234567890111222',
            'nama' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => '2023-03-30 11:11:31',
            'password' => Hash::make('12345'),
            'telp' => '123456789022',
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

        DB::table('users')->insert([
            'nik' => '1234567890111333',
            'nama' => 'Masyarakat',
            'email' => 'masyarakat@gmail.com',
            'email_verified_at' => '2023-03-30 11:11:31',
            'password' => Hash::make('12345'),
            'telp' => '123456789033',
            'jenis_kelamin' => 'Laki-laki',
            'role' => 'Warga',
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
