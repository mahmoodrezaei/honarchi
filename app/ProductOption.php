<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table = "product_option";

    protected $fillable = ['type', 'name', 'position'];

    public function values()
    {
        return $this->hasMany('App\ProductOptionValue', 'option_id');
    }
}
