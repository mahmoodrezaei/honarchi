<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

    /*protected $with = [
        'optionValue',
        'pricingConfiguration'
    ];*/

    public function product()
    {
        return $this->belongsTo("App\Product");
    }

    public function optionValue()
    {
        return $this->belongsToMany("App\ProductOptionValue", "product_variant_option_value", 'product_variant_id', 'product_option_value_id');
    }

    public function pricingConfiguration()
    {
        return $this->hasOne("App\ProductVariantPricing");
    }
}
