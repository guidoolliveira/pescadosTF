<?php

namespace App\Providers;
use App\Models\Product;
use Illuminate\Support\Facades\View;


use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::defaultStringLength(125);
        View::share('outOfStockProducts', Product::where('quantity', 0)->get());
    }
}