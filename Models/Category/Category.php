<?php

namespace Khaleds\LaravelProduct\Models\Category;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Translatable;
    protected $guarded=['id'];
    public $translatedAttributes = ['name', 'description','slug'];

    protected $hidden = ['translations'];

    public static $rules = [
        'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id'=>'nullable|numeric|exists:categories,id',
        'en.name'=>'required',
        'en.description'=>'required|max:250',
        'en.slug'=>'required|max:15',
        'ar.name'=>'nullable',
        'ar.slug'=>'required|max:15',
        'ar.description'=>'nullable|max:250',
    ];


    public function Parent(){

        return $this->belongsTo(Category::class,'category_id');
    }
    public function Children()
    {
        return $this->hasMany(Category::class, 'category_id');
    }


}
