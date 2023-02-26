<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndoRegionController extends Controller
{
    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();

        $options = "<option>--Pilih Kabupaten/Kota--</option>";

        foreach($kabupatens as $k){
            $options .= "<option value='$k->id'>$k->name</option>";
        }

        echo $options;
    }
    
    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatan = District::where('regency_id', $id_kabupaten)->get();

        $options = "<option>--Pilih Kecamatan--</option>";

        foreach($kecamatan as $k){
            $options .= "<option value='$k->id'>$k->name</option>";
        }

        echo $options;
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desa = Village::where('district_id', $id_kecamatan)->get();

        $options = "<option>--Pilih Desa--</option>";

        foreach($desa as $d){
            $options .= "<option value='$d->id'>$d->name</option>";
        }

        echo $options;
    }
}
