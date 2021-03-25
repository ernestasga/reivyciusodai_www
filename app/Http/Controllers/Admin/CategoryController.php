<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories')->with('categories', $categories);
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
        $description = $request->input('description');
        $icon = $request->input('icon');
        $file = $request->file('file');

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:2000',
                'icon' => 'nullable|string|max:255',
                'file' => 'required'
            ]
        );
        $response = Category::create(
            [
                'name'=>$name,
                'description'=>$description,
                'icon'=>$icon
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $icon = $request->input('icon');
        $file = $request->file('file');

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:2000',
                'icon' => 'nullable|string|max:255',
                'file' => ''
            ]
        );

        $response = Category::find($category->id)->update(
            [
                'name'=>$name,
                'description'=>$description,
                'icon'=>$icon
            ]);
        if($file){
            $category->addMedia($file)->toMediaCollection('images');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $response = $category->delete();
        if($response){
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg', 'An error occured']);
        }
    }
}
