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
        'is_simple',
        'enabled'
    ];

    protected $casts = [
        'is_simple' => 'boolean'
    ];

    protected $with = ['gallery', 'categories'];

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

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    public function isSimple()
    {
        return $this->is_simple;
    }

    public function options()
    {
        return $this->belongsToMany('App\ProductOption', 'product_options', 'product_id', 'option_id');
    }

    public function recommendations()
    {
        return $this->belongsToMany('App\Product', 'product_product_recommendation', 'product_id', 'recommend_id');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\ProductAttribute', 'product_attribute_value', 'product_id', 'attribute_id')->withPivot(['text_value', 'json_value']);
    }

    public function variants()
    {
        return $this->hasMany('App\ProductVariant', 'product_id');
    }

    public function categories()
    {
        return  $this->belongsToMany('App\ProductCategory');
    }
}
