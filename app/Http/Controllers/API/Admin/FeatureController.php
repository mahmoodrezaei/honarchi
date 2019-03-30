<?php

namespace App\Http\Controllers\API\Admin;

use App\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::all();

        return response()->json($features, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|unique:features',
            'key_id' => [
                'nullable',
                'integer',
                'min:1',
                'exists:features,id',
                function ($attribute, $value, $fail) {
                    if ($value != null && $key = Feature::find($value)) {
                        if ($key->key_id)
                            $fail(trans('validation.feature_key_id_should_not_assign_to_a_feature_value'));
                    }
                }
            ],
        ]);
        $request['slug'] = str_slug($request['name']);

        $feature = Feature::create($request->all());

        return response()->json($feature, 201);
    }

    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'name' => "required|max:30|unique:features,name,{$feature->id}",
            'key_id' => [
                'nullable',
                'integer',
                'min:1',
                'exists:features,id',
                function ($attribute, $value, $fail) {
                    if ($value != null && $key = Feature::find($value)) {
                        if ($key->key_id)
                            $fail(trans('validation.feature_key_id_should_not_assign_to_a_feature_value'));
                    }
                }
            ],
        ]);
        $request['slug'] = str_slug($request['name']);

        $feature->update($request->all());

        return response()->json($feature, 200);
    }

    public function destroy(Feature $feature)
    {

        Validator::make($feature->toArray(), [
            'id' => function ($attribute, $value, $fail) use ($feature) {
                if ($feature->hasChildren()) {
                    $fail(trans('validation.A_number_of_entities_are_related', ['entities' => trans('validation.entities.value.plural'), 'entity' => trans('validation.entities.feature.singular')]));
                }
            }
        ])->validate();

        $feature->delete();

        return response()->json(null, 204);
    }
}
