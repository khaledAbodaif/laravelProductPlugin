<?php

namespace Khaleds\LaravelProduct\Models\Product;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['name', 'description','slug'];

    protected $guarded=['id'];

    protected $hidden = ['translations'];

    public static $rules = [
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id'=>'required|numeric|exists:categories,id',
        'package_count'=>'nullable|numeric',
        'stock'=>'nullable|numeric',
        'en.name'=>'required',
        'en.description'=>'nullable|max:250',
    ];


}
