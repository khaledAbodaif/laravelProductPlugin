<?php

namespace Khaleds\LaravelProduct\Repositories;

use Khaleds\LaravelProduct\Models\Product\Product;

class ProductRepository extends BaseRepository
{

   public function __construct(Product $model)
    {
        parent::__construct($model);
    }

}
