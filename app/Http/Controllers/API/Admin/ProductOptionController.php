<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{

    public function index()
    {
        $options = ProductOption::orderBy('created_at', 'desc')->get();

        $data = [
            'options' => $options,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'optionType' => 'required',
            'name' => 'required'
        ]);

        $option = ProductOption::create([
            'type' => $request->optionType,
            'name' => $request->name,
            'position' => ProductOption::getLastPosition()
        ]);


        foreach ($values = $request->values as $item) {
            $option->values()->create([
                'value' => json_encode($item)
            ]);
        }

        $data = [
            $option,
            'values' => $option->values,
            'message' => 'گزینه جدید با موفقیت ساخته شد'
        ];

        return response()->json($data, 201);
    }

    public function show(ProductOption $option)
    {
        $data = [
            'option' => $option,
            'values' => $option->values,
            'message' => __('successfully_data_received')
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, ProductOption $option)
    {

        $request->validate([
            'name' => 'required'
        ]);

        $option->update([
            'name' => $request->name,
        ]);

        foreach ($values = $request->values as $item) {
            if ($item['id'] !== null) {
                $option->values()
                    ->where('id', $item['id'])
                    ->update([
                        'value' => json_encode($item['value']),
                    ]);
            } else {
                $option->values()->create([
                    'value' => json_encode($item['value']),
                ]);
            }
        }

        $data = [
            'option' => $option,
            'values' => $option->values,
            'message' => __('successfully_data_received')
        ];

        return response()->json($data, 200);
    }
}
