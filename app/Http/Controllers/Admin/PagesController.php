<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        $category_count = Category::count();
        $product_count = Product::count();
        $post_count = Post::count();
        return view('admin.index', compact('category_count', 'product_count', 'post_count'));
    }


    public function categories(){
        $categories = DB::table('categories')->get();
        return view('admin.categories')->with('categories', $categories);
    }

    public function products(){
        return view('admin.products');
    }

    public function posts(){
        return view('admin.posts');
    }

    public function orders(){
        return view('admin.orders');
    }

}
