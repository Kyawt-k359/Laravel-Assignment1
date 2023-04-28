<?php

namespace App\Providers;

use App\Repository\Blog\BlogInterface;
use App\Repository\Blog\BlogRepository;
use App\Repository\Post\PostRepository;
use App\Repository\Post\PostRepositoryInterface;
use App\Services\Blog\BlogServices;
use App\Services\Blog\BlogServicesInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BlogInterface::class,BlogRepository::class);
        $this->app->bind(BlogServicesInterface::class,BlogServices::class);
        $this->app->bind(PostRepositoryInterface::class,PostRepository::class);
    }
}
