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

        return view('contents.add-portfolio');
    }

    public function store(PortfolioRequest $request)
    {   
        /*
            save post data
        */
        $store_post = Post::create([
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            // 'category_id' => $request->post_category,
            'post_content' => $request->post_content,
            'price_start' => $request->price_start,
            'price_end' => $request->price_end,
            'post_status' => 'publish',
        ]);


        if($store_post->save())
        {
            /*
            save all image
            */ 
            $post = Post::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            $images = $request->file();
            
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
                }
                else
                {
                    return "Error uploading file";
                }
            }

            /*
                save post meta
            */ 

        }
        /* all save data is done */

        // return dd($request->all(), $request->file(), $photo_url);
        alert()->success('Menambah Portofolio', 'Berhasil');
        return redirect()->route('addPortfolio');

    }


    public function storeImages()
    {
        
    }
}
