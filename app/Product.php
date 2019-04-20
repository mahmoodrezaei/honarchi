<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable  = [
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
}
