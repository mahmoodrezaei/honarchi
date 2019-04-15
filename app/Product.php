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
}
