<?php

namespace App;

use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    protected $fillable = ['value'];

    public function option()
    {
        return $this->belongsTo(ProductOption::class, 'option_id');
    }

    public function getCreatedAtAttribute($created_at)
    {
        $verta = new Verta($created_at);
        return $verta->formatJalaliDate();
    }

    public function getValueAttribute($value)
    {
        return json_decode($value);
    }
}
