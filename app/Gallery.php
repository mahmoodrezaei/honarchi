<?php

namespace App;

use http\Exception;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{

    protected $guarded = ['id'];

    protected $casts = [
        'type' => 'array'
    ];

    public function getStateAttribute($state)
    {
        if ($state === -1) return 'بلاک';
        else if ($state === 0) return 'تایید نشده';
        else if ($state === 1) return 'تایید شده';
    }

    public function owner()
    {
        $this->belongsTo(User::class, 'owner_id');
    }
}
