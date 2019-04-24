<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable  = [
        'gallery_id',
        'sku',
        'name',
        'slug',
        'location',
        'short_description',
        'description',
        'max_purchase_per_rate',
        'published_date',
        'enabled'
    ];

    protected $with = ['gallery'];

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
        return $this->belongsToMany('App\ProductAttribute', 'product_attribute_value', 'product_id', 'attribute_id')->withPivot(['text_value', 'json_value']);
    }
}
