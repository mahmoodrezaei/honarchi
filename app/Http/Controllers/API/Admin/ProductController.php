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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category','gallery'])->get();

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProduct $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreProduct $request)
    {

        $request->validated();


        $product = Product::create($request->all());

        foreach ($request['features'] as $key => $feature){
            if ($feature['type'] == 'linked' ){

                if(isset($feature['value']))
                    $product->linked_features()->attach($feature['value']);
            }
        }

        $product->load(['category','gallery']);


        return response()->json($product, 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProduct $request
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateProduct $request, Product $product)
    {
        $product->linked_features()->detach();
        $product = $product->update($request->all());


        foreach ($request['features'] as $key => $feature){
            if ($feature['type'] == 'linked' ){

                if(isset($feature['value']))
                    $product->linked_features()->attach($feature['value']);
            }
        }
        $product->load(['category','gallery']);

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
            $product->delete();

            $product->linked_features()->detach();

            foreach ($product->pics as $pic){
                File::delete(storage_path('app/public/products/').basename($pic));
            }

        return response()->json(null, 204);
    }
}
