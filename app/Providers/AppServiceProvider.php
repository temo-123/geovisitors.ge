<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use View;

use App\About;
use App\Service;
use App\Blog;
use App\gallery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $about_all_page = About::all();
        View::share('about_all_page', $about_all_page);

        $service_all_page = Service::where('published','=','1')->limit(4)->get();
        View::share('service_all_page', $service_all_page);

        $blog_all_page = Blog::where('published','=','1')->limit(4)->get();
        View::share('blog_all_page', $blog_all_page);

        $gallery_all_page = gallery::inRandomOrder()->where('published','=','1')->limit(6)->get();
        View::share('gallery_all_page', $gallery_all_page);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
