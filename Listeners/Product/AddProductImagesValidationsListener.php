<?php

namespace Khaleds\LaravelProduct\Listeners\Product;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Khaleds\LaravelProduct\Events\Product\StoreProductStartEvent;
use Khaleds\LaravelProduct\Http\Requests\ProductImages\StoreRequest;
use Khaleds\LaravelProduct\Models\Product\ProductImage;

class AddProductImagesValidationsListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    /**
     * Handle the event.
     *
     * @param  \Khaleds\LaravelProduct\Events\Product\StoreProductStartEvent  $event
     * @return void
     */
    public function handle(StoreProductStartEvent $event)
    {
        //

        $request=new StoreRequest($event->request);

        $request->setContainer(app());

        $request->validate(ProductImage::$eventRules);

    }
}
