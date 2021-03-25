<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        return view('admin.products')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $stock = $request->input('stock');
        $popular = (bool) $request->input('popular');

        $files = $request->file('file');
        $request->validate(
            [
                'category_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:2000',
                'price' => 'required|between:0,10000',
                'sale_price' => 'nullable|between:0,10000',
                'stock' => 'nullable|integer|between:0,10000',
                'file' => ''
            ]
        );

        $response = Product::create(
            [
                'category_id'=>$category_id,
                'name'=>$name,
                'description'=>$description,
                'price'=>$price,
                'sale_price'=>$sale_price,
                'stock'=>$stock,
                'popular'=>$popular,
            ]);
        if($response){
            $this->attachMedia($response, $files);
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg', 'An error occured']);
        }
    }


    public function update(Request $request, Product $product)
    {
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $price = $request->input('price');
        $sale_price = $request->input('sale_price');
        $stock = $request->input('stock');
        $popular = (bool) $request->input('popular');
        $files = $request->file('file');

        $request->validate(
            [
                'category_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:2000',
                'price' => 'required|between:0,10000',
                'sale_price' => 'nullable|between:0,10000',
                'stock' => 'nullable|integer|between:0,10000',
                'file' => ''
            ]
        );

        $product = Product::find($product->id);
        $response = $product->update(
            [
                'category_id'=>$category_id,
                'name'=>$name,
                'description'=>$description,
                'price'=>$price,
                'sale_price'=>$sale_price,
                'stock'=>$stock,
                'popular'=>$popular,
            ]);
        if($response){
            $this->attachMedia($product, $files);
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg', 'An error occured']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $response = $product->delete();
        if($response){
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg', 'An error occured']);
        }
    }
    public function attachMedia(Product $product, $files){
        if($files){
            foreach($files as $file){
                $product->addMedia($file)->toMediaCollection('images');
            }
        }

    }
}
