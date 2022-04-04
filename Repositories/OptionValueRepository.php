<?php

namespace Khaleds\LaravelProduct\Repositories;

use Khaleds\LaravelProduct\Models\Option\OptionValue;

class OptionValueRepository extends BaseRepository
{

   public function __construct(OptionValue $model)
    {
        parent::__construct($model);
    }

}
