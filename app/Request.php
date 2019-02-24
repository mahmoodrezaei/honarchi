<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';
    protected $fillable =
        [
            'first_name', 'last_name', 'email', 'subject' , 'description'
        ];
}