<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVariantPricing extends Model
{
    protected $table = 'product_variant_pricing';

    protected $casts = [
        'configuration' => 'array'
    ];
}
