<?php

namespace Khaleds\LaravelProduct\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = ['name', 'description','slug'];


//    public function setSlugAttribute(){
////        return  $this->attributes['counter'] ;
//
//    }

}
