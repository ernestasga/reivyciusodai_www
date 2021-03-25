<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOTools::setTitle(config('app.posts_page_name').' - '.config('app.products_name'));
        SEOTools::setDescription(config('app.posts_page_name').' - '.config('app.description'));

        $posts = Post::orderBy('updated_at', 'desc')->paginate(config('app.paginate_count'));
        return view('pages.all_posts', compact('posts'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->firstOrFail();
        SEOTools::setTitle($post->name);
        SEOTools::setDescription($post->description);

        return view('pages.post', compact('post'));
    }

}
