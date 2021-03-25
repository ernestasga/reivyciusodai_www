<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $content = $request->input('content');
        $file = $request->file('file');

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'content' => 'required|string|max:20000',
                'file' => 'required'
            ]
        );
        $response = Post::create(
            [
                'name'=>$name,
                'content'=>$content
            ]);
        if($file){
            $response->addMedia($file)->toMediaCollection('images');
        }

        if($response){
            return redirect()->back();;
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $name = $request->input('name');
        $content = $request->input('content');
        $file = $request->file('file');

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'content' => 'required|string|max:20000',
                'file' => ''
            ]
        );

        $response = Post::find($post->id)->update(
            [
                'name'=>$name,
                'content'=>$content
            ]);
        if($file){
            $post->addMedia($file)->toMediaCollection('images');
        }
        if($response){
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg', 'An error occured']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $response = $post->delete();
        if($response){
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg', 'An error occured']);
        }
    }
}
