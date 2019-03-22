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
        'code',
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
        $value = json_decode($value, TRUE);

       $value =  array_map(function ($item){
           return Storage::url('products/').$item;
        },$value);

        return $value;
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
        $model->code = (string) strtoupper(uniqid());
        $model->save();

        return $model;
    }

    public function update(array $attributes = [], array $options = [])
    {
        $pics = array();
        if (isset($attributes['pics']) && is_array($attributes['pics']) && !empty($attributes['pics']) )
        {
            Log::info($attributes['pics']);
            // remove url
            $this_pics = [];
            foreach ($this->pics as $pic){
                $this_pics[] = basename($pic);
            }

            Log::info($this_pics);


            foreach ($attributes['pics'] as  $pic)
            {

                if(preg_match('/data:(.*)/', $pic)){

                    $data = explode( ',', $pic );
                    $file = base64_decode($data[1]);

                    $pic_name = md5(time().str_random()).'.'.explode('/', substr($data[0], 0, strpos($data[0], ';')))[1];
                    $pics[] = $pic_name;

                    file_put_contents(storage_path('app/public/products/').$pic_name, $file);

                } elseif (is_string($pic)){
                    foreach ($this_pics as $index => $this_pic){
                        Log::info(basename($pic));
                        if ($this_pic == basename($pic)){
                            $tmp = $this_pics;
                            array_splice($tmp, 0, $index);
                            $this_pics = $tmp;

                            File::delete(storage_path('app/public/products/').basename($pic));
                        }
                    }
                }
            }
            $this->pics = array_merge($this_pics, $pics);
        }

        Log::info($this->pics);

        Parent::update($attributes, $options);

        return $this;

    }




}













//public function setFeaturesAttribute($value)
//    {
//        $this->attributes['features'] = json_encode($value);
//    }
//
//    public function getFeaturesAttribute($value)
//    {
//        $product_features = DB::table('productfeatures')->get()->all();
//        $this_product_feature = DB::table('product_productfeature')->where('product_id', $this->id)->get()->all();
//
//        foreach ($product_features as $feature){
//            foreach ($this_product_feature as $key => $value ){
//                if ($value->feature_id = $feature->id){
//                    $this_product_feature[$key]->value = $feature;
//                }
//            };
//        }
//
//
//       return json_decode($value, true);
//    }
