<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    /**
     * The products that belong to the category.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
