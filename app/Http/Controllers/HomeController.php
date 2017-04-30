<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Umeta;
use Auth;
use App\Categories;
use App\DProvinsi;
use Cache;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            show all post pagination 8
        */
        $img = ' ';
        $minutes = 1;
        

        $categories = Categories::all()->pluck('category', 'id');          
        $provinsi = DProvinsi::all()->pluck('nama', 'id_prov');          

        $posts = Post::with('user.umetas.kab_kota.provinsi', 'post_metas.category')->orderBy('created_at', 'desc')->paginate(8); 
        return view('welcome', compact('posts','img', 'categories', 'provinsi'));
    }

    public function home()
    {
        /*
            show all post pagination 8
        */
        $img = ' ';

        $id = Auth::user()->id;

        $posts = Post::with('user.umetas.kab_kota.provinsi', 'post_metas.category')->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(8); 
        return view('home', compact('posts','img'));
    }


    public function userHome(Request $request, $id, $slug)
    {
        /*
            show all post pagination 8
        */
        $img = ' ';
        

        $id = $request->id;

        $posts = Post::with('user.umetas.kab_kota.provinsi', 'post_metas.category')->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(8); 
        return view('home', compact('posts','img'));
    }



    public function singlePost($id, $slug)
    {   
        /*
            show single post
        */

        $post = Post::find($id);

        return view('contents.single-post', compact('post'));
    }

    public function search(Request $request, Post $posts)
    {   
        // manual search without engine
        $location = $request->get('location');
        $keyword = $request->get('key');
        $category = $request->get('category');
        $max_price = $request->get('max_price');
        $img = ' ';


        // new query for filter
        $search = $posts->newQuery();

        // filter by location
        if($request->has('location')){
            $search->whereHas('umetas', function($query) use ($location){
                        $query->where('meta_value', $location);
                    });
        }
        // filter by keyword
        if($request->has('key')){
            $search->where('post_title', 'like', '%'.$keyword.'%')
                    ->orWhere('post_content', 'like', '%'.$keyword.'%') 
                    ->whereHas('post_metas', function($query) use ($keyword){
                        $query->where('meta_value', 'like', '%'.$keyword.'%');
                    });
        }
        // filter by category
        if($request->has('category')){
            $search->whereHas('post_metas', function($query) use ($category){
                        $query->where('meta_value', $category);
                    });
                    
        }
        // filter by price
        if($request->has('max_price')){
            $search->where('price_end', '<', $max_price);
        }

        //result query
        $posts =  $search->with('user.umetas.kab_kota.provinsi', 'post_metas.category')->orderBy('created_at', 'desc')->paginate(12);
       

        return view('contents.search', compact('posts', 'img'));
    }
}
