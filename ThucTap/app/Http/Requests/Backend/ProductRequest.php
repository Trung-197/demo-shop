<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => ['required',
            'unique:products',
            'max:255',Rule::unique('products','name')->ignore($this->id)],
            'price' => 'required',
            'category_id' => 'required',
            'contents' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'name',
            'price' => 'price',
            'feature_image_path' => 'feature_image_path',
            'content' => 'contents',
            'category_id' => 'category_id'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không được quá 255 kí tự',
            'category_id.required' => 'Danh mục không được để trống',
            'price.required' => 'Giá tiền không được để trống',
            'content.required' => 'Nội dung không được để trống',
        ];
    }
}
