<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;
use Auth;
use Storage;

// model
use App\Allimage;
use App\Post;
use App\PostMeta;

class PortfolioController extends Controller
{

    public function view()
    {
        $category = ['1' => 'Desain','2' => 'Furniture', '3' => 'Fashion'];

        return view('contents.add-portfolio', compact('category'));
    }

    public function store(PortfolioRequest $request)
    {   

        /*
            save post data
        */
        // remove dot from price
        $conv_price_start = str_replace(".", "", $request->price_start);
        $conv_price_end = str_replace(".", "", $request->price_end);

        $store_post = Post::create([
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            // 'category_id' => $request->post_category,
            'post_content' => $request->post_content,
            'price_start' => $conv_price_start,
            'price_end' => $conv_price_end,
            'post_status' => 'publish',
        ]);


        if($store_post->save())
        {
            /*
            save all image
            */ 
            $post = Post::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            $images = $request->file();
            
            $j = 1;
            foreach ($images as $key => $value) {
                $file = $request->$key;
                $file_name = $file->getClientOriginalName();
                $dest = 'images/'.Auth::user()->id.'/'.'post/';

                if ( Storage::disk('public')->put($dest.$file_name, file_get_contents($file)) )
                {
                    $photo_url = Storage::url($dest.$file_name);
                    
                    // simpan url photo ke tabel all image
                    $store_images = Allimage::create([
                        'user_id' => Auth::user()->id,
                        'post_id' => $post->id,
                        'image_path' => $photo_url,
                        'description' => $request->default_image,
                    ]);
                    $store_images->save();                

                    // default image
                    if($request->default_image == $j++){
                        $default_image = Storage::url($dest.$file_name);
                    }

                }
                else
                {
                    alert()->error('Ada kesalahan unggah foto', 'Gagal');
                    return redirect()->route('addPortfolio');
                }
            }


            /*
                save post meta
            */ 
            // add meta key and meta value
            $meta_key = [
                'post_type' => 'portfolio', 
                'default_image' => $default_image, 
                'post_tags' => $request->post_tags,
                'post_category' => $request->post_category,
            ];

            foreach ($meta_key as $key => $value) {
                $store_post_meta = PostMeta::create([
                    'post_id' => $post->id,
                    'meta_key' => $key,
                    'meta_value' => $value,
                ]);
            }

        }

        /* all save data is done */
        alert()->success('Menambah Portofolio', 'Berhasil');
        return redirect()->route('addPortfolio');

    }




}
