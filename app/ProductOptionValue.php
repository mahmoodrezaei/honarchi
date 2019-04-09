<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    public function option()
    {
        return $this->belongsTo(ProductOption::class, 'option_id');
    }
}
