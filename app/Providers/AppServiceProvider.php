<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\View;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        Carbon::setUtf8(true);
        Carbon::setLocale(config('app.locale'));
        setlocale(LC_TIME, config('app.locale'));
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->add([
                'text' => 'Categories',
                'route'  => 'categories.index',
                'label' => Category::all()->count(),
                'icon' => 'fas fa-fw fa-list',
            ]);
            $event->menu->add([
                'text' => 'Products',
                'route'  => 'products.index',
                'label' => Product::all()->count(),
                'label_color' => 'success',
                'icon' => 'fas fa-fw fa-fan',
            ]);
            $event->menu->add([
                'text' => 'Posts',
                'route'  => 'posts.index',
                'label' => Post::all()->count(),
                'label_color' => 'info',
                'icon' => 'fas fa-fw fa-blog',
            ]);
        });


        View::composer('*', function ($view) {
            $view->with('categories', Category::all())
                 ->with('product_count', Product::count())
                 ->with('latest_posts', Post::orderBy('updated_at', 'desc')->take(config('app.latest_posts_count'))->get()) ;
        });
    }
}
