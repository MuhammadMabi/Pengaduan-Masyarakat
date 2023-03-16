<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use App\Image;

class DashboardController extends Controller
{
    
    public function index()
    {
        $foto = Image::count();
        $pengaduan = Pengaduan::count();
        $pending = Pengaduan::where('status', 'Pending')->count();
        $ditolak = Pengaduan::where('status', 'Ditolak')->count();
        $proses = Pengaduan::where('status', 'Proses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();
        $admin = User::where('role', 'Admin')->count();
        $petugas = User::where('role', 'Petugas')->count();
        $warga = User::where('role', 'Warga')->count();
        $kategori = Kategori::count();
        $tanggapan = Tanggapan::count();
        return view('dashboard.index', compact('pengaduan', 'pending', 'ditolak', 'proses', 'selesai', 'admin', 'petugas', 'warga', 'kategori', 'tanggapan', 'foto'));
    }

}
