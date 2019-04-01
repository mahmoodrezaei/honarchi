<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SplFileInfo;
use File;

class Product extends Model
{
    protected $attributes = [
        'rate' => 0,
    ];

    protected $guarded = [
        'id',
        'pics',
        'rate',
        'created_at',
        'updated_at',
        'category',
        'gallery'
    ];

    protected $casts = [
        'pics' => 'array',
        'features' => 'array'
    ];

    public function getPicsAttribute($value)
    {
        if($value = json_decode($value, TRUE)){
            $value =  array_map(function ($item){
                return Storage::url('products/').$item;
            },$value);

            return $value;
        }

       return [];
    }

    public function category()
    {
       return $this->belongsTo('App\Category');
    }

    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }

    public function linked_features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public static function create(array $attributes = [])
    {
        $pics = array();
        foreach ($attributes['pics'] as  $pic){
            if(preg_match('/data:(.*)/', $pic)){

                $data = explode( ',', $pic );
                $file = base64_decode($data[1]);

                $pic_name = md5(time().str_random()).'.'.explode('/', substr($data[0], 0, strpos($data[0], ';')))[1];
                $pics[] = $pic_name;

                file_put_contents(storage_path('app/public/products/').$pic_name, $file);

            }
        }

        $model = Product::make($attributes);
        $model->pics = $pics;
        $model->save();

        return $model;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $pics = array();
        if ( isset($attributes['pics']) && is_array($attributes['pics']) && !empty($attributes['pics']) )
        {
            // convert URLs to files name
            $this_pics = array_map(function ($pic){
                return basename($pic);
            }, $this->pics);

            foreach ($attributes['pics'] as  $pic)
            {
                if(preg_match('/data:(.*)/', $pic))
                {
                    $data = explode( ',', $pic );

                    $file = base64_decode($data[1]);
                    $pic_name = md5(time().str_random()).'.'.explode('/', substr($data[0], 0, strpos($data[0], ';')))[1];

                    file_put_contents(storage_path('app/public/products/').$pic_name, $file);
                    $pics[] = $pic_name;

                } elseif (is_string($pic))
                {
                    if (($index = array_search(basename($pic),$this_pics)) !== false)
                    {
                        unset($this_pics[$index]);
                        File::delete(storage_path('app/public/products/').basename($pic));
                    }
                }
            }
            $this->pics = array_merge($this_pics, $pics);
        }

        Parent::update($attributes, $options);

        return $this;

    }

}
