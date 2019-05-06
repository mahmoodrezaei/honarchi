<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_image';

//    protected $with = ['variants'];

    public function variants()
    {
        return $this->belongsToMany('App\ProductVariant', 'product_image_product_variant');
    }

    public function getPathAttribute($path)
    {
        return '/storage/productImages/' . $path;
    }
}
