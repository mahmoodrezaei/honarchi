<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

    protected $table = 'info';

    protected $fillable =
        [
            'cover_title', 'cover_body', 'cover_img', 'title', 'body', 'img', 'address', 'phone', 'cell_phone', 'email', 'instagram', 'telegram'
        ];


}
