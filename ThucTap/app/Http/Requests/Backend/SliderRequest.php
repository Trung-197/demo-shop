<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
            Rule::unique('sliders','name')->ignore($this->id)],
            'description' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'name',
            'description' => 'description',
            'image_path' => 'image_path'
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không được quá 255 kí tự',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}
