<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'gallery' => 'required|nullable|integer|min:1|exists:galleries,id',
            'gallery' => 'required',
            'sku' => 'required|unique:products',
            'name' => 'required|max:50',
            'slug' => 'required|unique:products',
            'location' => 'required|string',
            'short_description' => 'max:255',
            'description' => 'required|string',
            'max_purchase_per_rate' => 'required|integer',
            'published_date' => 'required',
            'enabled' => 'required',
            'prebuy' => 'required',
            'prebuy_min' => 'required_if:prebuy,true',
            'prebuy_max' => 'required_if:prebuy,true',
        ];
    }
}
