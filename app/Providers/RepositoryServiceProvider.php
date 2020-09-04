<?php

namespace App\Providers;

use App\Repository\Eloquent\SegmentRepository;
use App\Repository\Eloquent\SubscribeRepository;
use App\Repository\SegmentInterface;
use App\Repository\SubscribeInterface;
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
        $this->app->bind(SubscribeInterface::class,SubscribeRepository::class);
        $this->app->bind(SegmentInterface::class,SegmentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
