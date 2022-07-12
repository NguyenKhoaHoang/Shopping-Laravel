<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingEditRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'config_key' => 'bail|required|max:255|unique:settings,config_key,'.$id,
            'config_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'config_key.required' => 'Config key không được trống',
            'config_key.unique' => 'Config key không được trùng',
            'config_key.max' => 'Config key không được quá 255 ký tự',
            'config_value.required' => 'Config value không được trống',
        ];
    }
}
