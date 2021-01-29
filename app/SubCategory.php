<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function product(){ 
        return $this->hasMany(Product::class)->orderBy('updated_at', 'desc'); 
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productphoto(){ 
        return $this->hasMany(Product::class)->orderBy('updated_at', 'desc')->with('images'); 
    }

}
