<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Debug\Tests\testHeader;

class Category extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function hasChildren(){
        if($this->children()->count()){
            return true;
        }

        return false;
    }

    public function hasParent(){
        if($this->parent()->get()){
            return true;
        }

        return false;
    }

}
