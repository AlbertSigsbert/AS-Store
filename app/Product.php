<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function scopeMightLike($query)
    {
       return $query->inRandomOrder()->take(4);
    }
}
