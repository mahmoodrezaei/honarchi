<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use File;
use App\Product;
use DB;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index()
    {

    }

    public function store(StoreProduct $request)
    {

        $product = Product::create($request->all());
//        $product->gallery()->save($request->gallery);

        $response_data = [
            'product' => $product,
            'response_code' => 200
        ];

        return response()->json($response_data, 200);
    }

    public function syncAttribute(Request $request ,Product $product)
    {
        $requestData = $request->all();

        $product->attributes()->detach();

        foreach ($requestData as $item){
            switch ($item['selectedAttribute']['type']){
                case 'متن':
                    $product->attributes()->attach($item['id'], ['text_value' => $item['textValue']]);
                    break;
                case 'انتخاب':
                    if ($item['selectedAttribute']['configuration']['type'] == 'choices')
                        $product->attributes()->attach($item['id'], ['json_value' =>  json_decode([$item['singleChoice']['code']])]);
                    elseif ($item['selectedAttribute']['configuration']['type'] == 'multiple')
                        $product->attributes()->attach($item['id'], ['json_value' =>  json_decode(array_column($item['multipleChoice'], 'code'))]);
                    break;
            }

        }

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_sync'),
            'data' => null
        ];

        return response()->json($responseData,200);
    }
}
