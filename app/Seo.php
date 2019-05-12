<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';

    protected $fillable = ['meta_description', 'meta_keywords'];

    public function seoble()
    {
        return $this->morphTo();
    }
}
