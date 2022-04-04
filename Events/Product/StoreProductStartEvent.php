<?php

namespace Khaleds\LaravelProduct\Events\Product;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Client\Request;
use Illuminate\Queue\SerializesModels;

class StoreProductStartEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->request=request()->all();
    }


}
