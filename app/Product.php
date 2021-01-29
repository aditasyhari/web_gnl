<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'desc',
        'name',
        'price',
        'single_category_id',
        'sub_category_id'
    ];

    public function images(){ 
        return $this->hasMany(Photo::class); 
    }

    public function subcategory(){ 
        return $this->belongsTo(SubCategory::class);
    }

    public function singlecategory(){ 
        return $this->belongsTo(SingleCategory::class);
    }


    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
             $product->images()->delete();
             // do the rest of the cleanup...
        });
    }
}
