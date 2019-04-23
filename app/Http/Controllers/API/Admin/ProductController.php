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
        $products = Product::orderBy('id', 'desc')->get();
        return response()->json($products);
    }

    public function indexNames()
    {
        $products = Product::orderBy('id', 'desc')->get(['id', 'name']);
        return response()->json($products, 200);
    }

    public function store(StoreProduct $request)
    {

        $product = Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'slug' => $request->slug,
            'location' => $request->location,
            'gallery_id' => $request->gallery['id'],
            'short_description' => $request->short_description,
            'description' => $request->description,
            'enabled' => $request->enabled,
            'max_purchase_per_rate' => $request->max_purchase_per_rate,
            'published_date' => $request->published_date
        ]);

        $data = [
            'message' => 'محصول با موفقیت ایجاد شد',
            'product_id' => $product->id,
            'response_code' => 200
        ];

        return response()->json($data, 200);
    }


    public function show(Product $product)
    {
        $data = [
            'product' => $product,
            'message' => __('successfully_data_received')
        ];

        return response()->json($data, 200);
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
