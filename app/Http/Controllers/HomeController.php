<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

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
            show all post pagination 10
        */
        
        $posts = Post::with('user.umetas.kab_kota', 'post_metas')->orderBy('created_at', 'desc')->paginate(8); 
        return view('welcome', compact('posts'));
    }

    public function home()
    {
        /*
            show all post pagination 10
        */
        
        $id = Auth::user()->id;
        $posts = Post::with('user.umetas.kab_kota', 'post_metas')->where('user_id', $id)->orderBy('created_at', 'desc')->paginate(8); 
        return view('home', compact('posts'));
    }


    public function singlePost($id, $slug)
    {   
        /*
            show single post
        */

        $post = Post::find($id);

        return view('contents.single-post', compact('post'));
    }
}
