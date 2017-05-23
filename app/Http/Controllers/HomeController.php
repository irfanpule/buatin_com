<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Umeta;
use Auth;
use App\Categories;
use App\DProvinsi;
use Cache;
use App\User;

class HomeController extends Controller
{

    public function nextPrevious($id, $nextOrPre)
    {
        if($nextOrPre == 'next'){

            $query = Post::where('id', '>', $id)->get();
            $data_id = $query->min('id');

        }
        elseif($nextOrPre == 'previous'){

            $query = Post::where('id', '<', $id)->get();
            $data_id = $query->max('id');

        }


        if($data_id)
            $data = (object)[
                'id' => $data_id,
                'title' => $query->find($data_id)->post_title,
            ];
        else{
            $data = (object)[
                'id' => '',
                'title' => '',
            ];
        }

        return $data;

    }


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
        $user = User::find($id);


        if(str_slug($user->display_name) == $slug && $user->id == $id)
        {
            $posts = Post::with('user.umetas.kab_kota.provinsi', 'post_metas.category')->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(8); 
            return view('home', compact('posts','img'));
        }

        return "404 not found";
    }



    public function singlePost($id, $slug)
    {   
        /*
            show single post
        */
        $post = Post::find($id);

        if(str_slug($post->post_title) == $slug && $post->id == $id)
        {
            /*
            previous post
            */ 
            $previous = $this->nextPrevious($post->id, 'previous');

            /*
                next post
            */ 
            $next = $this->nextPrevious($post->id, 'next');

            return view('contents.single-post', compact('post', 'next', 'previous'));
        }

        return "404 not found";
        
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
