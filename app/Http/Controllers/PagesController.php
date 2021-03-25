<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PagesController extends Controller
{
    public function index()
    {
        $on_sale = Product::whereNotNull('sale_price')->get();
        $popular =Product::where('popular', true)->get();
        return view('pages.index', compact('on_sale', 'popular'));
    }
    public function contact()
    {
        SEOTools::setTitle(config('app.contact_page_name'));
        SEOTools::setDescription(config('app.description'));

        return view('pages.contact');
    }
}
