<?php

namespace Khaleds\LaravelProduct\Repositories;

use Khaleds\LaravelProduct\Models\Product\ProductImage;

class ProductImagesRepository extends BaseRepository
{

   public function __construct(ProductImage $model)
    {
        parent::__construct($model);
    }

}
