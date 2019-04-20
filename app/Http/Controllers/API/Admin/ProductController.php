<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use File;
use App\Product;
use DB;

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
}
