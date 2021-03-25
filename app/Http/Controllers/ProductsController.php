<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOTools::setTitle(config('app.products_name'));
        SEOTools::setDescription(config('app.description'));
        $products = Product::paginate(config('app.paginate_count'));
        return view('pages.all_products', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::whereSlug($slug)->firstOrFail();
        SEOTools::setTitle($product->name);
        SEOTools::setDescription($product->description);
        if($product->getFirstMediaUrl('images', 'compressed')){
            SEOTools::addImages($product->getFirstMediaUrl('images', 'compressed'));
        }
        return view('pages.product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
