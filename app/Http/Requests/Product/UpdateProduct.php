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
//            'category_id' => 'nullable|integer|min:1|exists:categories,id',
            'gallery' => 'required',
            'sku' => 'required|unique:products,sku,'.$id,
            'name' => 'required|max:50',
            'slug' => 'required|unique:products,slug,'.$id,
            'location' => 'required|string',
            'short_description' => 'required|max:255',
            'description' => 'required|string',
            'max_purchase_per_rate' => 'required|integer',
            'published_date' => 'required',
            'enabled' => 'required'
        ];
    }
}
