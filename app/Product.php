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

    public function setPublishedDateAttribute($value)
    {
        \Log::info($value);
        list($date, $time) = explode(' ' , $value);
        list($year, $month, $day) = explode('/', $date);
        $date = implode('-', \Verta::getGregorian($year, $month, $day));
        $this->attributes['Published_date'] = implode(' ', [$date, $time]);
    }

    public function getPublishedDateAttribute($value)
    {
        list($date, $time) = explode(' ' , $value);
        list($year, $month, $day) = explode('-', $date);
        $date = implode('/', \Verta::getJalali($year, $month, $day));
        $published_date = implode(' ', [$date, $time]);

        return $published_date;
    }

    public function options()
    {
        return $this->hasMany('App\ProductOption', 'option_id');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    public function recommendations()
    {
        return $this->belongsToMany('App\Product', 'product_product_recommendation', 'product_id', 'recommend_id');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\ProductAttribute', 'product_attribute_value', 'attribute_id', 'product_id')->withPivot(['text_value', 'json_value']);
    }
}
