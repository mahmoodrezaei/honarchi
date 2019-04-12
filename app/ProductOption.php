<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table = 'product_option';

    protected $fillable = ['type', 'name', 'position'];

    public function getCreatedAtAttribute($created_at)
    {
        $verta = new Verta($created_at);
        return $verta->formatJalaliDate();
    }

    public static function getLastPosition()
    {
        if (static::all()->isNotEmpty())
            return static::all()->sortByDesc('position')->first()->position + 1;

        return 1;
    }

    public function values()
    {
        return $this->hasMany('App\ProductOptionValue', 'option_id');
    }
}
