<?php

namespace App\Http\Controllers;

use App\User;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Pengaduan::count();
        $pending = Pengaduan::where('status', 'Pending')->count();
        $proses = Pengaduan::where('status', 'Proses')->count();
        $selesai = Pengaduan::where('status', 'Selesai')->count();
        $admin = User::where('role', 'Admin')->count();
        $petugas = User::where('role', 'Petugas')->count();
        $warga = User::where('role', 'Warga')->count();
        $tanggapan = Tanggapan::count();
        $foto = Pengaduan::where('foto')->get();
        return view('dashboard.index', compact('pengaduan', 'pending', 'proses', 'selesai', 'admin', 'petugas', 'warga', 'tanggapan', 'foto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
