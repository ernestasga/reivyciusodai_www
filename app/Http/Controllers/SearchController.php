<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Spatie\Searchable\Search;
class SearchController extends Controller
{
    public function search(Request $request){
        $searchResults = (new Search())
            ->registerModel(Product::class, ['name', 'description'])
            ->registerModel(Post::class, ['name', 'content'])
            ->registerModel(Category::class, ['name', 'description'])
            ->limitAspectResults(5)
            ->search($request->input('term'));
        return response()->json($searchResults);
    }
}
