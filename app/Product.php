<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function options()
    {
        return $this->hasMany('App\ProductOption', 'option_id');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\ProductAttribute', 'product_attribute_value', 'attribute_id', 'product_id')->withPivot(['text_value', 'json_value']);
    }
}
