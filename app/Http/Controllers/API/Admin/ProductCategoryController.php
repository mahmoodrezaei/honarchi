<?php

namespace App\Http\Controllers\API\Admin;


use App\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class ProductCategoryController extends Controller
{

    public function index()
    {
        $allModels = ProductCategory::all();

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_all_data_received'),
            'data' => $allModels
        ];

        return response()->json($responseData, 200);
    }

    public function show(ProductCategory $model)
    {
        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_received'),
            'data' => $model
        ];

        return response()->json($responseData,200);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'parent_id' => 'nullable|integer|min:1|exists:product_categories,id',
            'slug' => ['required',
                Rule::unique('product_categories')->where(function ($query) use($request) {
                    return $query->where('slug', $request['slug'])
                        ->where('parent_id', $request['parent_id']);
                }),
                ],
            'name'      => [
                'required',
                'max:30',
                Rule::unique('product_categories')->where(function ($query) use($request) {
                    return $query->where('name', $request['name'])
                        ->where('parent_id', $request['parent_id']);
                }),

                ],
        ]);


        $model = ProductCategory::make($request->all());
        $model->position = $model->getLastPosition();
        $model->save();

        $responseData = [
            'status_code' => 201,
            'message' => __('successfully_created'),
            'data' => $model
        ];

        return response()->json($responseData,201);
    }


    public function update(Request $request, ProductCategory $model)
    {
        Validator::make($model->toArray(), [
            'id' => [
                function ($attribute, $value, $fail)  {
                    if ($value == 1) {
                        $fail(trans('validation.unauthorized_wont_able_to_modify'));
                    }
                },


            ]
        ])->validate();

        $this->validate($request, [
            'parent_id' => 'nullable|integer|min:1|exists:product_categories,id',
            'slug' => ['required',
                Rule::unique('product_categories')->where(function ($query) use($request, $model) {
                    if($request['slug'] == $model->slug && $request['parent_id'] == $model->parent_id){
                        return $query->where('id', -1);
                    }

                    return $query->where('slug', $request['slug'])
                        ->where('parent_id', $request['parent_id']);
                })
                ],
            'name'      => [
                'required',
                'max:30',
                Rule::unique('product_categories')->where(function ($query) use($request, $model) {
                    if($request['name'] == $model->name && $request['parent_id'] == $model->parent_id){
                        return $query->where('id', -1);
                    }

                    return $query->where('name', $request['name'])
                        ->where('parent_id', $request['parent_id']);
                }),

                ]
        ]);


        $model->update($request->all());

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_data_updated'),
            'data' => $model
        ];

        return response()->json($responseData,200);
    }


    public function destroy(ProductCategory $model)
    {
        Validator::make($model->toArray(), [
            'id' => [
                function ($attribute, $value, $fail) use ($model) {
                    if ($model->hasChildren()) {
                        $fail(trans('validation.A_number_of_entities_are_related', ['entities' => trans('validation.entities.category.plural'), 'entity' => trans('validation.entities.category.singular')]));
                    }
                },

                function ($attribute, $value, $fail)  {
                    if ($value == 1) {
                        $fail(trans('validation.unauthorized_wont_able_to_delete'));
                    }
                },
                ]
        ])->validate();

        if(!empty($model->products())) {
            foreach($model->products()->get() as $product){
                if($product->categories->count() == 1){
                    $product->categories()->sync(1);
                }
            }
        }

        $model->delete();

        $responseData = [
            'status_code' => 200,
            'message' => __('successfully_deleted'),
            'data' => null
        ];

        return response()->json($responseData,200);
    }
}
