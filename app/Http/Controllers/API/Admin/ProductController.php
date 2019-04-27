<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\ProductOption;
use App\ProductVariant;
use App\ProductVariantPricing;
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

    public function getAttributes(Product $product)
    {
        $productAttributes = $product->attributes()->get();
        foreach ($productAttributes as $key => $attribute){
            $productAttributes[$key]->pivot->json_value = json_decode($attribute->pivot->json_value);
        }

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_received'),
            'data' => $productAttributes
        ];

        return response()->json($responseData,200);
    }

    public function syncAttributes(Request $request ,Product $product)
    {
        $requestData = $request->all();

        $product->attributes()->detach();

        foreach ($requestData as $item){
            switch ($item['selectedAttribute']['type']){
                case 'متن':
                    $product->attributes()->attach($item['selectedAttribute']['id'], ['text_value' => $item['textValue']]);
                    break;
                case 'انتخاب':
                    if ($item['selectedAttribute']['configuration']['type'] == 'choices')
                        $product->attributes()->attach($item['selectedAttribute']['id'], ['json_value' =>  json_encode([$item['singleChoice']['code']])]);
                    elseif ($item['selectedAttribute']['configuration']['type'] == 'multiple')
                        $product->attributes()->attach($item['selectedAttribute']['id'], ['json_value' =>  json_encode(array_column($item['multipleChoice'], 'code'))]);
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

    public function syncVariant(Request $request, Product $product)
    {

        $request->validate([
            'on_hand' => 'required',
            'name' => [
                'required_if:is_simple,1',
                Rule::unique('product_variants')->where(function ($query) use($request, $product) { return $query->where('name', $request['name'])->where('parent_id', $product->id); })
            ],
            'code' => [
                'required_if:is_simple,true',
                Rule::unique('product_variants')->where(function ($query) use($request, $product) { return $query->where('code', $request['code'])->where('parent_id', $product->id); })
            ],
            'height' => 'present',
            'width' => 'present',
            'depth' => 'present',
            'weight' => 'present',
            'pricing_configuration' => 'required',
            'option' => 'present'
        ]);

            foreach ($request->all() as $item){

                $variant =  isset($item['id']) ? ProductVariant::find($item['id']) : new ProductVariant();
                $variant->product_id = $product->id;
                $variant->name = $product->is_simple ? $item->name : "1";
                $variant->code = $product->is_simple ? $item->code : "1";
                $variant->on_hand = $item['on_hand'];
                $variant->on_hold = 0;
                $variant->height  = $item['height'];
                $variant->width  = $item['width'];
                $variant->depth   = $item['depth'];
                $variant->weight  = $item['weight'];
                $variant->save();

                $variantPricing = isset($item['id']) ? ProductVariantPricing::find($item['id']) : new ProductVariantPricing();
                $variantPricing->variant_id = $variant->id;
                $variantPricing->configuration = $request['pricing_configuration'];
                $variantPricing->save();

                $variant->optionValue()->sync($request['options']);

            }

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_sync'),
            'data' => null
        ];

        return response()->json($responseData,200);

    }

    public function destroyVariant(ProductVariant $variant)
    {
        $variant->optionValue()->detach();
        $variant->delete();

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_deleted'),
            'data' => null
        ];

        return response()->json($responseData,200);
    }
}
