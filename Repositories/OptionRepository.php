<?php

namespace Khaleds\LaravelProduct\Repositories;

use Khaleds\LaravelProduct\Models\Option\Option;

class OptionRepository extends BaseRepository
{

   public function __construct(Option $model)
    {
        parent::__construct($model);
    }

}
