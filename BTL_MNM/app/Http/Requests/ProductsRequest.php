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
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:2500',
            'description' => 'required',
            'price' => 'required|number|min:1',
            // 'hot' => 'required',
            // 'parent_id' => 'required'
        ];
    }
    public function messages(){
        return[
            'name.required' => 'Mời bạn nhập tiêu đề',
            'content.required' => 'Hãy nhập vào nội dung',
            // 'category_id.required' => 'Mời bạn nhập tiêu đề',
            'description.required' => 'Hãy nhập vào mô tả cho sản phẩm',
            'price.required' => 'Hãy nhập vào giá bán',
            // 'hot.required' => 'Mời bạn nhập tiêu đề',
            // 'parent_id.required' => 'Mời bạn nhập tiêu đề',
        ];
    }
}
