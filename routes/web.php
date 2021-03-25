<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\PagesController::class, 'contact'])->name('contact');
Auth::routes();


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [App\Http\Controllers\Admin\PagesController::class, 'index'])->name('admin.index');
    Route::resource('/admin/categories', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/admin/products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('/admin/posts', App\Http\Controllers\Admin\PostController::class);

    Route::delete('/admin/media', [App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('admin.media.delete');
});

// Visitor routes
Route::group(['as'=>'visitor.'], function () {
    Route::resource('/sodinukai', App\Http\Controllers\ProductsController::class, [
        'names' => [
            'index' => 'product.index',
            'show' => 'product.show',
        ]
    ])->only(['index', 'show']);
    Route::resource('/augalai', App\Http\Controllers\CategoriesController::class, [
        'names' => [
            'index' => 'category.index',
            'show' => 'category.show',
        ]
    ])->only(['index', 'show']);
    Route::resource('/irasai', App\Http\Controllers\PostsController::class, [
        'names' => [
            'index' => 'post.index',
            'show' => 'post.show',
        ]
    ])->only(['index', 'show']);
    Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
});
