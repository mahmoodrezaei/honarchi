<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table = "product_option";

    protected $fillable = ['type', 'name', 'position'];

    public function getCreatedAtAttribute($created_at)
    {
        $verta = new Verta($created_at);
        return $verta->formatJalaliDate();
    }

    public function values()
    {
        return $this->hasMany('App\ProductOptionValue', 'option_id');
    }
}
