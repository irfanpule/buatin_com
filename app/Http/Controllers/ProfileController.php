<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Dprovinsi;


class ProfileController extends Controller
{

    public function view(Request $request){

        $user = User::find($request->id)->first();

        // method pluck menggantikan method lists
        $prov_lists = DProvinsi::pluck('nama', 'id_prov')->all();


        return view('contents.pengaturan', compact('user', 'prov_lists'));
    }
    /*
        save profile
    */ 
    public function store(Request $request) {

        $request->all();

    }
}
