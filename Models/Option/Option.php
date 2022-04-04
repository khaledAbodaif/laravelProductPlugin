<?php

namespace Khaleds\LaravelProduct\Models\Option;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    use Translatable;

    protected $guarded=['id'];
    public $translatedAttributes = ['name'];

    protected $hidden = ['translations'];

    public static $rules = [
        'en.name'=>'required',
        'ar.name'=>'nullable',

    ];
}
