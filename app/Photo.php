<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    // protected $table = 'photos';
    protected $fillable =['name','product_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
