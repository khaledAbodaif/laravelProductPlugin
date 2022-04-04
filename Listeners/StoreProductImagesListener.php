<?php

namespace Khaleds\LaravelProduct\Listeners;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Khaleds\LaravelProduct\Events\StoreProductEvent;
use Khaleds\LaravelProduct\Libraries\ApiResponseLibrary;
use Khaleds\LaravelProduct\Models\Product\ProductImage;
use Khaleds\LaravelProduct\Services\ProductImagesService;
use Khaleds\LaravelProduct\Http\Requests\ProductImages\StoreRequest;

class StoreProductImagesListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    private $service;
    public function __construct(ProductImagesService $service)
    {
        //
        $this->service=$service;
    }

    /**
     * Handle the event.
     *
     * @param  \Khaleds\LaravelProduct\Events\StoreProductEvent  $event
     * @return void
     */
    public function handle(StoreProductEvent $event)
    {
        //
        Log::info('insecond');
        $request=Validator::make($event->request->all(),ProductImage::$rules);

        if(!$request->errors()->any()){
            $returned =$this->service->store($event->product->id);

            //add it to session also or we can add event
            if (!$returned['status'])
                ApiResponseLibrary::$append=$returned;
        }


    }
}
