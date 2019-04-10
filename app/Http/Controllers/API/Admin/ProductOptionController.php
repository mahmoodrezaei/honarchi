<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{

    public function index()
    {
        return 'options.index';
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
        ]);

        /*if ($request->values != null) {
            if ($request->optionType === 'text') {

            }
        }*/

        $data = [
            $option,
            'values' => $request->values[0]['name'],
            'message' => 'option created successfully'
        ];

        return response()->json($data, 201);
    }
}
