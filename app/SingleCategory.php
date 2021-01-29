<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SingleCategory extends Model
{
    //
    protected $fillable = ['name'];

    public function product(){ 
        return $this->hasMany(Product::class)->orderBy('updated_at', 'desc'); 
    }

    public function productphoto(){ 
        return $this->hasMany(Product::class)->orderBy('updated_at', 'desc')->with('images'); 
    }
}
