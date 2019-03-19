<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
        'updated_at'
    ];

    protected $casts = [
        'pics' => 'array',
        'features' => 'array'
    ];


    public static function create(array $attributes = [])
    {
        $pics = array();
        foreach ($attributes['pics'] as  $pic){
            $pic_name = str_replace(['/','.'],'0',bcrypt($pic->getClientOriginalName())).'.'.$pic->getClientOriginalExtension();
            $pics[] = $pic_name;
            $pic->move(storage_path('app/public/products'), $pic_name);
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
            foreach ($attributes['pics'] as  $pic)
            {
                if($pic instanceof SplFileInfo){
                    $pic_name = str_replace(['/','.'],'0',bcrypt($pic->getClientOriginalName())).'.'.$pic->getClientOriginalExtension();
                    $pics[] = $pic_name;
                    $pic->move(storage_path('app/public/products'), $pic_name);
                } elseif (is_string($pic)){

                    if ($index = array_search($pic, $this->pics) !== false){
                        $this_pics = $this->pics;
                        array_splice($this_pics, 0, $index);
                        $this->pics = $this_pics;

                        File::delete(storage_path('app/public/products/').$pic);
                    };
                }
            }
        }
        $this->pics = array_merge($this->pics, $pics);

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
