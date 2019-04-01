<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
        $id = $this->product->id;

        return [
            'category_id' => 'nullable|integer|min:1|exists:categories,id',
            'gallery_id' => 'nullable|integer|min:1|exists:galleries,id',
            'name' => 'required|max:50',
            'slug' => 'required|unique:products,slug,'.$id,
            'code' => 'required|unique:products,slug,'.$id,
            'intro' => 'required|max:255',
            'location' => 'required|string',
            'description' => 'required|string',
            'no' => 'required|integer',
            'major_no' => 'required|integer',
            'features' => 'nullable|array',
            'pics' => 'nullable|array',
            'max_purchase_per_rate' => 'required|integer',
        ];
    }
}
