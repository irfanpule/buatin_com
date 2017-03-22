<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Dprovinsi;
use App\Umeta;
use App\Http\Requests\ProfileRequest;
use Auth;

class ProfileController extends Controller
{

    public function MetaKeyProfile(){

        return ['provinsi', 'kab-kota', 'address', 'phone_number', 'wa_number', 'pin_bbm','website','display_name'];

    }

    public function view(Request $request){

        // method pluck menggantikan method lists
        $prov_lists = DProvinsi::pluck('nama', 'id_prov')->all();

        $user = User::find(Auth::user()->id)->first();

        $umeta = Umeta::where('user_id', Auth::user()->id)->get();

        
        return view('contents.pengaturan', compact('user', 'prov_lists', 'umeta'));        
        
    }
    

    /*
        save profile
    */ 
    public function store(ProfileRequest $request) {

        $meta_key = $this->MetaKeyProfile();
        $umeta = Umeta::where('user_id', Auth::user()->id)->get();

        if ($umeta->count() <= 0) {
            /*
                create New
            */
            foreach ($meta_key as $key => $value) {
                // $i[] = [ $value => $request->$value ];

                $store_umeta = Umeta::create([
                    'user_id' => Auth::user()->id,
                    'meta_key' => $value,
                    'meta_value' => $request->$value,
                ]);
                $store_umeta->save();
            }

            return redirect()->route('settings');
        }
        else {
            /*
                update
            */ 
            foreach ($meta_key as $key => $value) {

                $update_umeta = Umeta::where('user_id', Auth::user()->id)->where('meta_key', $value);
                $update_umeta->update([
                    'user_id' => Auth::user()->id,
                    'meta_key' => $value,
                    'meta_value' => $request->$value,
                ]);
            }

            return redirect()->route('settings');
        }
        



    }
}
