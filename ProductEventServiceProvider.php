<?php

namespace Khaleds\LaravelProduct;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Khaleds\LaravelProduct\Events\Product\StoreProductStartEvent;
use Khaleds\LaravelProduct\Events\StoreProductEvent;
use Khaleds\LaravelProduct\Listeners\Product\AddProductImagesValidationsListener;
use Khaleds\LaravelProduct\Listeners\StoreProductImagesListener;

class ProductEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        StoreProductEvent::class => [
            StoreProductImagesListener::class,
        ],
        StoreProductStartEvent::class => [
            AddProductImagesValidationsListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();

    }
}
