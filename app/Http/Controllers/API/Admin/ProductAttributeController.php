<?php

namespace App\Http\Controllers\API\Admin;

use App\ProductAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'code' => 200,
            'status' => 'Ok',
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
            'name' => 'required|unique:product_attributes',
            'slug' => 'required|unique:product_attributes',
            'type' => 'required|in:text,select',
            'configuration' => 'array',
//            'configuration.values.name' => 'required',
            'linkable' => 'required|boolean'
        ]);

        $model = ProductAttribute::create($request->all());

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
            'name' => "required|unique:product_attributes,name,$model->id",
            'slug' => "required|unique:product_attributes,slug,$model->id",
            'type' => 'required|in:text,select',
            'configuration' => 'array',
            'linkable' => 'required|boolean'
        ]);

        $model->update($request->all());

        $responseData = [
            'code' => 200,
            'status' => 'Ok',
            'message' => __('successfully_data_received'),
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
        $model->delete();

        $responseData = [
            'code' => 200,
            'status' => 'Ok',
            'message' => __('successfully_deleted'),
            'data' => null
        ];

        return response()->json($responseData,200);
    }
}
