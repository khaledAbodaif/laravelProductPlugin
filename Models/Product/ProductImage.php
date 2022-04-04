<?php

namespace Khaleds\LaravelProduct\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public $timestamps = true;
    public static $rules=[
        'images'=>'required',
        'images.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'product_id'=>'required|exists:products,id',

    ];
    public static $eventRules = [
        'images.*'=>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'product_id'=>'sometimes|nullable|exists:products,id',
    ];
}
