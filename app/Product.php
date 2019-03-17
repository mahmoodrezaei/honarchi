<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'pics' => 'array',
        'features' => 'array'
    ];




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
