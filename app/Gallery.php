<?php

namespace App;

use Hekmatinasser\Verta\Verta;
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
        if ($state === -1) return 'مسدود';
        else if ($state === 0) return 'تایید نشده';
        else if ($state === 1) return 'تایید شده';
    }

    public function getCreatedAtAttribute($created_at)
    {
        $verta = new Verta($created_at);
        return $verta->formatJalaliDate();
    }

    public function owner()
    {
        $this->belongsTo(User::class, 'owner_id');
    }
}
