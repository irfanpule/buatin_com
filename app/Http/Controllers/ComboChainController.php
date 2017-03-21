<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DProvinsi;
use App\DKabKota;

class ComboChainController extends Controller
{
    
    public function ProvId($provId) {

        $kabs = DKabKota::where('id_prov', $provId)->get();
        return response()->json($kabs);

    }


    public function KabId($kabId) {


    }
}
