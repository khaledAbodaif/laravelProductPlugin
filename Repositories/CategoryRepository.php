<?php

namespace Khaleds\LaravelProduct\Repositories;

use Khaleds\LaravelProduct\Models\Category\Category;

class CategoryRepository extends BaseRepository
{

   public function __construct(Category $model)
    {
        parent::__construct($model);
    }

}
