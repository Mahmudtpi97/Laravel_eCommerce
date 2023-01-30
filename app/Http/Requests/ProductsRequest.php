<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
             'category_id'          => 'required',
             'sub_category_id'      => 'nullable',
             'product_title'        => 'required',
             'product_description'  => 'required',
             'current_price'        => 'required',
             'old_price'            => 'required',
             'product_size'         => 'required',
             'product_color'        => 'required',
             'product_img'          => 'required|mimes:png,jpg',
             'status'               => 'nullable',
        ];
    }
}
