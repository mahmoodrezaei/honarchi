<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $guarded = [
        'id',
        'storage_type',
        'position'
    ];

    protected $casts = [
        'configuration' => 'array'
    ];

    public static function getLastPosition()
    {
        if (static::all()->isNotEmpty())
          return static::all()->sortByDesc('position')->first()->position + 1;

        return 1;
    }

    public static function create(array $attributes = [])
    {
        $model = static::make($attributes);
        switch ($attributes['type']){
            case 'متن':
                $model->storage_type = 'text';
                break;
            case 'انتخاب':
                $model->storage_type = 'json';
                break;
        }
        $model->position =  static::getLastPosition();

        $model->save();

        return $model;
    }

    public function update(array $attributes = [], array $options = [])
    {
//        switch ($attributes['type']){
//            case 'text':
//                $this->storage_type = 'text';
//                break;
//            case 'select':
//                $this->storage_type = 'json';
//                break;
//        }

        Parent::update($attributes, $options);

        return $this;
    }
}
