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

        $service_all_page = Service::all();
        View::share('service_all_page', $service_all_page);

        $blog_all_page = Blog::all();
        View::share('blog_all_page', $blog_all_page);

        $gallery_all_page = gallery::all();
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
