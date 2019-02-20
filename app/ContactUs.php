<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_uses';
    protected $fillable =
        [
            'title', 'address', 'phone', 'cell_phone', 'email', 'instagram', 'telegram'
        ];

}
