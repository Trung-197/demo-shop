<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingRequest extends FormRequest
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
//            'config_key' => 'required|unique:settings,config_key,id|max:255',
            'config_key' => [
                'required',
                'max:255',
                Rule::unique('settings','config_key')->ignore($this->id)
            ],
            'config_value'=> 'required'
        ];
    }
}
