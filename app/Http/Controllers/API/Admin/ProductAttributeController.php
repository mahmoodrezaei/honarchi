<?php

namespace App\Http\Controllers\API\Admin;

use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allModels =  ProductAttribute::all();

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_all_data_received'),
            'data' => $allModels
        ];

        return response()->json($responseData,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'linkable' => 'required|boolean',
            'name' => "required|unique:product_attributes",
            'slug' => [
                'required_if:linkable,1',
                function ($attribute, $value, $fail) use ($request) {
                    if($request['linkable']){
                        $query =  \DB::table('product_attributes')->where('slug', $value);
                        if($query->count()){
                            $fail(__('validation.unique', [$attribute]));
                        }
                    } else $fail($attribute.' must not sent.1');
                },
                ],
            'type' => 'required|in:متن,انتخاب',
            'configuration' => 'array',
            'configuration.type' => 'required_if:type,انتخاب',
            'configuration.values.*.value' => 'required_if:type,انتخاب',
            'configuration.values.*.slug' =>
                [
                    Rule::requiredIf(function () use ($request)
                    {
                        return $request['type'] == 'انتخاب' && $request['linkable'] == true;
                    }),

                    function ($attribute, $value, $fail) use ($request)
                    {
                        if($request['linkable']){
                            if(count(array_filter($request['configuration']['values'], function ($item) use ($value){return $item['slug'] == $value ? true : false;})) > 1)
                                $fail(__('validation.unique', [$attribute]));

                            $query =  \DB::table('product_attributes')->where('configuration', 'LIKE', '%'.str_replace("\\","\\\\\\",json_encode($value)).'%');
                            if($query->count() == 1){
                                $fail(__('validation.unique', [$attribute]));
                            }
                        } else $fail($attribute.' must not sent.2');
                    }
                ]
        ]);
        $requestData = $request->all();

        if($requestData['type'] == 'انتخاب')
        foreach ($requestData['configuration']['values'] as $key => $item){
            $requestData['configuration']['values'][$key]['code'] = uniqid();
        }



        $model = ProductAttribute::create($requestData);

        $responseData = [
            'status_code' => 201,
            'message' => __('successfully_created'),
            'data' => $model
        ];

        return response()->json($responseData,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $model)
    {
        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_received'),
            'data' => $model
        ];

        return response()->json($responseData,200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $model)
    {

        $request->validate([
            'linkable' => 'required|boolean',
            'name' => "required|unique:product_attributes,name,$model->id",
            'slug' => [
                'required_if:linkable,1',
                function ($attribute, $value, $fail) use ($request, $model) {
                if($request['linkable']){
                   $query =  \DB::table('product_attributes')->where('slug', $value);
                   if($query->count() == 1 && $query->first()->id != $model->id){
                       $fail(__('validation.unique', [$attribute]));
                   }
                } else $fail($attribute.' must not sent.');
            }],
            'type' => 'required|in:متن,انتخاب',
            'configuration' => 'array',
            'configuration.type' => 'required_if:type,انتخاب',
            'configuration.values.*.value' => 'required_if:type,انتخاب',
            'configuration.values.*.slug' =>
                [
                    Rule::requiredIf(function () use ($request)
                    {
                        return $request['type'] == 'انتخاب' && $request['linkable'] == true;
                    }),

                    function ($attribute, $value, $fail) use ($request, $model)
                    {
                        if($request['linkable']){

                            if(count(array_filter($request['configuration']['values'], function ($item) use ($value){return $item['slug'] == $value ? true : false;})) > 1)
                                $fail(__('validation.unique', [$attribute]));

                            $query =  \DB::table('product_attributes')->where('configuration', 'LIKE', '%'.str_replace("\\","\\\\\\",json_encode($value)).'%');
                            if($query->count() == 1 && $query->first()->id != $model->id){
                                $fail(__('validation.unique', [$attribute]));
                            }
                        } else $fail($attribute.' must not sent.');
                    }
                ]
        ]);

        $requestData = $request->except(['deletedAttributeItemConfigurationValues']);

        if($requestData['type'] == 'انتخاب')
        foreach ($requestData['configuration']['values'] as $key => $item){
            if(!$requestData['configuration']['values'][$key]['code'])
            $requestData['configuration']['values'][$key]['code'] = uniqid();
        }

        $model->update($requestData);

//        foreach ($request['deletedAttributeItemConfigurationValues'] as $item){
//            $products = Product::where('configuration', 'LIKE', "%$item%")->get();
//            foreach ($products as $product){
//                foreach ($product->configuration['values'] as $index => $value){
//                    if($value == $item){
//                        unset($product->configuration['values'][$index]);
//                        $product->save();
//                    }
//                }
//            }
//        }


        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_updated'),
            'data' => $model
        ];

        return response()->json($responseData,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ProductAttribute $model)
    {

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_deleted'),
            'data' => null
        ];

        return response()->json($responseData,200);
    }
}
