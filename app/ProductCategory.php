<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id'];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo('App\ProductCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\ProductCategory', 'parent_id');
    }

    public function hasChildren()
    {
        if ($this->children()->count()) {
            return true;
        }

        return false;
    }

    public function hasParent()
    {
        if ($this->parent()->get()) {
            return true;
        }

        return false;
    }


    public function getLastPosition()
    {

        if (static::where('parent_id', $this->parent_id)->get()->isNotEmpty())
            return  static::where('parent_id', $this->parent_id)->get()->sortByDesc('position')->first()->position + 1;

        return  1;
    }
}
