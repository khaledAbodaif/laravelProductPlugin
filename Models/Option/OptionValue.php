<?php

namespace Khaleds\LaravelProduct\Models\Option;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;
    use Translatable;

    protected $guarded=['id'];
    public $translatedAttributes = ['name'];

    protected $hidden = ['translations'];
// add defualt for all images
    public static $rules = [
        'en.name'=>'required',
        'ar.name'=>'nullable',
        'option_id'=>'required',
        'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ];
}
