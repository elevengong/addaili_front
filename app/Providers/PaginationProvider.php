<?php

namespace App\Providers;

use Illuminate\Pagination\MyAjaxBootstrapThreePresenter;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider;

class PaginationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        Paginator::presenter(function (AbstractPaginator $paginator) {
//            return new MyAjaxBootstrapThreePresenter($paginator);
//        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
