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

    public function getUserProfile($id){

        $umeta = Umeta::where('user_id', $id)->get();

        $ar_key =[];
        $ar_value = [];
        $profile = '';

        if($umeta->count() > 0){
            foreach ($umeta as $prof) {
                array_push($ar_key, $prof->meta_key);
                array_push($ar_value, $prof->meta_value);
            }
        }

        $profile = array_combine($ar_key,$ar_value);

        return $profile;
    }

    public function view(Request $request){

        // method pluck menggantikan method lists
        $prov_lists = DProvinsi::pluck('nama', 'id_prov')->all();

        $user = User::find(Auth::user()->id);

        // get umeta data
        $umeta = $this->getUserProfile($user->id);


        return view('contents.pengaturan', compact('user', 'prov_lists', 'umeta'));        
        
    }
    

    
    public function store(ProfileRequest $request) {

        //menamvahkan meta_key sesuai dengan nama input pada form 
        foreach ($request->request as $key => $value) {
            if($key !== '_token'){
                $meta_key[] = $key; 
            }
        }

        $umeta = Umeta::where('user_id', Auth::user()->id)->get();

        if ($umeta->count() <= 0) {
            /*
                create New
                menyimpan semua request yang ada dan dijakian meta_key
                khusus bagi user yang sama sekali belum memiliki meta_key pada umeta
            */
            foreach ($meta_key as $key => $value) {

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
                logic update
                menyamakan jumlah meta_key request dengan meta_key yang sudah tersimpan
                jika sama, update semua
                jika jumlah berbeda, ambil request yang berbeda lalu simpan satu persatu
            */

            if($umeta->count() == count($meta_key)){

                foreach ($meta_key as $key => $value) {
                    $update_umeta = Umeta::where('user_id', Auth::user()->id)->where('meta_key', $value);
                    $update_umeta->update([
                        'user_id' => Auth::user()->id,
                        'meta_key' => $value,
                        'meta_value' => $request->$value,
                    ]);
                }

            }
            else{

                foreach ($umeta as $key => $value) {
                    $a[] = $value->meta_key;
                }

                //posisi jumlah array yang paling banyak harus disebelah kiri
                $key_diff = array_diff($meta_key, $a);

                // update request atau key yang sama
                foreach ($meta_key as $key => $value) {
                    $update_umeta = Umeta::where('user_id', Auth::user()->id)->where('meta_key', $value);
                    $update_umeta->update([
                        'user_id' => Auth::user()->id,
                        'meta_key' => $value,
                        'meta_value' => $request->$value,
                    ]);
                }


                //tambah baru request atau key berbeda
                foreach ($key_diff as $key => $value) {

                    $store_umeta = Umeta::create([
                        'user_id' => Auth::user()->id,
                        'meta_key' => $value,
                        'meta_value' => $request->$value,
                    ]);
                    $store_umeta->save();
                }
            }

            alert()->success('Berhasil menyimpan profil', 'Selamat');
            return redirect()->route('settings');
        }
        



    }


    public function editName(Request $request) {
        /*
            Jika type post name maka ubah name
                jika nama diambil dari sosmed maka tolak penggantian name
            Jika type post displayName maka ubah display name
        */ 

        // return dd($request);  
        if($request->type == 'name'){

            if(Auth::user()->provider == 'buatin') {

                // simpan
                $user = User::findOrFail(Auth::user()->id);
                $user->update([
                    'name' => $request->name,
                ]);

                alert()->success('Ubah Nama Pengguna', 'Berhasil');
                return redirect()->route('settings');


            }
            else{

                // tolak
                alert()->warning('Anda login menggunakan '.Auth::user()->provider, 'Gagal');
                return redirect()->route('settings');
            }

            
        }
        elseif($request->type == 'displayName'){

            $user = User::findOrFail(Auth::user()->id);
            $user->update([
                'display_name' => $request->display_name,
            ]);

            alert()->success('Ubah Nama Usaha / Jasa', 'Berhasil');
            return redirect()->route('settings');   
        }

    }


}
