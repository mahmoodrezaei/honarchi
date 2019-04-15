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
            'gallery_id' => 'nullable|integer|min:1|exists:galleries,id',
            'sku' => 'required|unique:products',
            'name' => 'required|max:50',
            'slug' => 'required|unique:products',
            'location' => 'required|string',
            'intro' => 'required|max:255',
            'description' => 'required|string',
            'no' => 'required|integer',
            'major_no' => 'required|integer',
            'features' => 'nullable|array',
            'pics' => 'nullable|array',
            'max_purchase_per_rate' => 'required|integer',
        ];
    }
}
