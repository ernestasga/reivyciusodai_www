<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $active_category = Category::whereSlug($slug)->firstOrFail();
        SEOTools::setTitle($active_category->name.' | '.config('app.title'));
        SEOTools::setDescription($active_category->description);

        $products = Product::where('category_id', $active_category->id)->paginate(config('app.paginate_count'));
        return view('pages.category', compact('products', 'active_category'));
    }

}
