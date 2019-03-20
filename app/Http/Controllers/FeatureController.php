<?php

namespace App\Http\Controllers;

use App\Feature;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();

        $result = [];
        foreach ($features as $feature){
            if ($feature->key_id){
                $result['features_values'][] = $feature;
            }else{
                $result['features_names'][] = $feature;
            }
        }

        return response()->json($result, 200);
    }
}
