<?php

namespace Khaleds\LaravelProduct\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Khaleds\LaravelProduct\Models\Product\Product;

class StoreProductEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $product;
    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product,$request)
    {
        //
        $this->product=$product;
        $this->request=$request;
    }



    public function ProductCreated(){
        Log::info("Item Created Event Fire: ".$this->product);

    }

    public function ProductCreating(){
        Log::info("Item Created Event Fire: ".$this->product);

    }
}
