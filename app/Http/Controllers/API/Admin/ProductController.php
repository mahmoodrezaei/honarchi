<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\ProductImage;
use App\ProductOption;
use App\ProductVariant;
use App\ProductVariantPricing;
use File;
use App\Product;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;
use Validator;
use Prophecy\Doubler\Generator\Node\ArgumentNode;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
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
            'published_date' => $request->published_date,
            'prebuy' => $request->prebuy,
            'prebuy_min' => $request->prebuy_min,
            'prebuy_max' => $request->prebuy_max,
        ]);

        $product->categories()->attach($request['categories']);

        $product->seo()->create([
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords
        ]);

        $product->load(['categories', 'gallery']);

        $data = [
            'message' => 'محصول با موفقیت ایجاد شد',
            'product_id' => $product->id,
            'response_code' => 200
        ];

        return response()->json($data, 200);
    }


    public function update(UpdateProduct $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'slug' => $request->slug,
            'location' => $request->location,
            'gallery_id' => $request->gallery['id'],
            'short_description' => $request->short_description,
            'description' => $request->description,
            'enabled' => $request->enabled,
            'max_purchase_per_rate' => $request->max_purchase_per_rate,
            'published_date' => $request->published_date,
            'prebuy' => $request->prebuy,
            'prebuy_min' => $request->prebuy_min,
            'prebuy_max' => $request->prebuy_max,
        ]);

        $product->categories()->sync($request['categories']);

        $product->seo()->update([
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords
        ]);

        $product->load(['categories', 'gallery', 'seo']);

        $data = [
            'message' => 'محصول با موفقیت بروزرسانی شد',
            'product' => $product,
            'status_code' => 200
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


    public function syncVariants(Request $request, Product $product)
    {

        foreach ($request->all() as $item) {
            Validator::make($item, [
                'on_hand' => 'required|integer',
                'name' => [
                    Rule::requiredIf(!$product->is_simple),
                    Rule::unique('product_variants')->where(function ($query) use ($item, $product) {
                        if (!isset($item['id'])) {
                            return $query->where('name', $item['name'])->where('product_id', $product->id)->where('deleted_at', null);
                        } elseif (($variant = ProductVariant::find($item['id'])) !== false) {
                            if ($item['name'] == $variant->name)
                                return $query->where('id', -1);
                            else
                                return $query->where('name', $item['name'])->where('product_id', $product->id)->where('deleted_at', null);
                        } else {
                            return $query->where('name', $item['name'])->where('product_id', $product->id)->where('deleted_at', null);
                        }
                    })
                ],
                'code' => [
                    Rule::requiredIf(!$product->is_simple),
                    Rule::unique('product_variants')->where(function ($query) use ($item, $product) {
                        if (!isset($item['id'])) {
                            return $query->where('code', $item['code'])->where('product_id', $product->id)->where('deleted_at', null);
                        } elseif (($variant = ProductVariant::find($item['id'])) !== false) {
                            if ($item['code'] == $variant->code)
                                return $query->where('id', -1);
                            else
                                return $query->where('code', $item['code'])->where('product_id', $product->id)->where('deleted_at', null);
                        } else {
                            return $query->where('code', $item['code'])->where('product_id', $product->id)->where('deleted_at', null);
                        }
                    })
                ],
                'height' => 'present',
                'width' => 'present',
                'depth' => 'present',
                'weight' => 'present',
                'pricing_configuration' => 'required',
                'options' => Rule::requiredIf(!$product->is_simple),
            ])->validate();
        }

        foreach ($request->all() as $item){

            $variant = isset($item['id']) ? ProductVariant::find($item['id']) : new ProductVariant();
            $variant->product_id = $product->id;
            $variant->name = $product->is_simple ? "1" : $item['name'];
            $variant->code = $product->is_simple ? "1" : $item['code'];
            $variant->on_hand = $item['on_hand'];
            $variant->on_hold = 0;
            $variant->height  = $item['height'];
            $variant->width  = $item['width'];
            $variant->depth   = $item['depth'];
            $variant->weight  = $item['weight'];
            $variant->save();

            $variantPricing = isset($item['pricing_id']) ? ProductVariantPricing::find($item['pricing_id']) : new ProductVariantPricing();
            $variantPricing->product_variant_id = $variant->id;
            $variantPricing->configuration = $item['pricing_configuration'];
            $variantPricing->save();

            if (!$product->is_simple) {
                $variant->optionValue()->sync($item['options']);
            }
        }

        $product->load(['variants.pricingConfiguration', 'variants.optionValue', 'options']);

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_sync'),
            'data' => $product,
        ];

        return response()->json($responseData,200);

    }

  
    public function getVariants(Product $product)
    {
//        $product = Product::where('id', $product)->with(['variants.pricingConfiguration' => function($query) { return $query->select(['configuration']);}, 'variants.optionValue'])->get();
        $product->load(['variants.pricingConfiguration', 'variants.optionValue', 'options']);

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_sync'),
            'data' => $product
        ];

        return response()->json($responseData,200);

    }

  
    public function destroyVariant(ProductVariant $variant)
    {
        $variant->optionValue()->detach();
        $variant->images()->detach();
        $variant->pricingConfiguration()->delete();
        $variant->delete();

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_deleted'),
            'data' => null
        ];

        return response()->json($responseData,200);
    }

  
    public function getOptions(Product $product)
    {
        $data = [
            'options' => $product->options,
            'isSimple' => $product->is_simple,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

      
    public function syncOptions(Request $request, Product $product)
    {
        $request->validate([
            'options' => 'required_if:isSimple,false'
        ]);

        if($product->is_simple != $request->isSimple)
        {
            $product->variants()->delete();
            
            $product->update([
                'is_simple' => $request->isSimple
            ]);

        }
       

        $optionIds = collect($request->options)->pluck('id')->toArray();

        if ($request->isSimple) {
            $product->options()->detach($optionIds);
        } else {
            $product->options()->sync($optionIds);
        }

        $data = [
            'message' => 'گزینه‌های مورد نظر با موفقیت ثبت شدند.',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

      
    // Recommendations
    public function getRecommendations(Product $product)
    {
        $data = [
            'recommendations' => $product->recommendations,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

      
    public function syncRecommendations(Request $request, Product $product)
    {
        $request->validate([
            'recommendations' => 'array|min:0'
        ]);

        $recommendedIds = collect($request->recommendations)->pluck('id')->toArray();

        $product->recommendations()->sync($recommendedIds);

        $data = [
            'message' => 'محصولات پیشنهادی با موفقیت ثبت شدند.',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }


    public function syncGallery(Request $request, Product $product)
    {
        Log::info($request->all());

        if($request->image !== 'undefined'){
            $uploadedImage = $request->file('image');
//            $imageName = uniqid() . $uploadedImage->getClientOriginalName();
            $imageName = Str::random(30) . '.' . $uploadedImage->getClientOriginalExtension();
            \Storage::disk('public')->putFileAs(
                'productImages',
                $uploadedImage,
                $imageName
            );
        }

        $productImage = isset($request['id']) ? ProductImage::find($request['id']) : new ProductImage();
        $productImage->product_id = $product->id;
        $productImage->alt  =  $request['alt'];
        $productImage->type =  filter_var($request['type'], FILTER_VALIDATE_BOOLEAN);
        $productImage->path = isset($request['id']) ?  isset($imageName) ? $imageName : preg_replace('/(.*)\/(.*)\/(.*)/', '$3', $productImage->path) : $imageName;

        $productImage->save();

        if (isset($request['variant']) || $request['variant'] == null)
            $productImage->variants()->sync($request['variant']);

        $data = [
            'message' => 'عکس با موفقیت ذخیره شد',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function getGallery(Product $product)
    {

        $productImages =  $product->images()->get();

        foreach ($productImages as $key => $image) {
            $productImages[$key]['variant'] = $image->variants->first();
        }

        $data = [
            'message' => 'success',
            'status_code' => 200,
            'data' => $productImages
        ];

        return response()->json($data, 200);
    }

    public function destroyImage(Product $product, int $image)
    {
//        $productImage->variants()->delete();

        $image = $product->images()->where('id', $image)->first();

        if ($image->type == 1) {
            $message = 'عکس شاخص حذف نمی‌شود';
        } else {
            $message = 'عکس با موفقیت حذف شد';
            $image->delete();
        }

        $data = [
            'message' => $message,
            'status_code' => 200,
        ];

        return response()->json($data, 200);
    }

    public function destroyProduct(Product $product){
        
        $product->delete();
        $product->variants()->delete();

        $data = [
            'message' => "successfully_deleted",
            'status_code' => 200,
        ];

        return response()->json($data, 200);
    }
    
}
