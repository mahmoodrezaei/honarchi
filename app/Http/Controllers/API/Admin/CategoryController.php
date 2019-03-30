<?php

namespace App\Http\Controllers\API\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|max:30|unique:categories',
            'parent_id' => 'nullable|integer|min:1|exists:categories,id'
        ]);
        $request['slug'] = str_slug($request['name']);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name'      => "required|max:30|unique:categories,name,{$category->id}",
            'parent_id' => 'nullable|integer|min:1|exists:categories,id'
        ]);
        $request['slug'] = str_slug($request['name']);

        $category->update($request->all());

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        Validator::make($category->toArray(), [
            'id' => function ($attribute, $value, $fail) use ($category) {
                if ($category->hasChildren()) {
                    $fail(trans('validation.A_number_of_entities_are_related', ['entities' => trans('validation.entities.category.plural'), 'entity' => trans('validation.entities.category.singular')]));

                }
            }
        ])->validate();

        $category->delete();


        return response()->json(null, 204);
    }
}
