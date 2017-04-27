<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Umeta;
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

    public function search(Request $request)
    {   
        // manual search without engine
        $location = $request->get('location');
        $keyword = $request->get('key');

        $umeta = Umeta::where('meta_key', 'kab-kota')->where('meta_value', $location)->get();

        foreach ($umeta as $key => $value) {
            $id_meta[] = $value->user_id;
        }

        
        $p = Post::whereHas('umetas', function($query) use ($location){
                        $query->where('meta_value', $location);
                    })
                    ->where('post_title', 'like', '%'.$keyword.'%')
                    ->where('post_content', 'like', '%'.$keyword.'%')
                    ->orWhereHas('post_metas', function($query) use ($keyword){
                        $query->where('meta_value', 'like', '%'.$keyword.'%');
                    })
                    ->get();


        foreach ($p as $key => $value) {
            $q[] = $value->post_title;
        }
        return dd($id_meta, $p, $q, '%'.$location.'%');
    }
}
