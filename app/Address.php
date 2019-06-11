<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'phone',
        'province',
        'city',
        'postal_address',
        'postal_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
