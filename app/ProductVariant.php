<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    public function product()
    {
        return $this->belongsTo("App\Product");
    }

    public function optionValue()
    {
        return $this->belongsToMany("App\ProductOption", "product_variant_option_value", 'product_variant_id', 'product_option_value_id');
    }

    public function pricing()
    {
        return $this->hasOne("App\ProductVariantPricing");
    }
}