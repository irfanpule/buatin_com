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
        
        $posts = Post::with('user', 'post_metas')->orderBy('created_at', 'desc')->paginate(9); 
        return view('welcome', compact('posts'));
    }

    public function home()
    {
        /*
            show all post pagination 10
        */
        
        $posts = Post::paginate(10); 
        return view('home', compact('posts'));
    }
}
