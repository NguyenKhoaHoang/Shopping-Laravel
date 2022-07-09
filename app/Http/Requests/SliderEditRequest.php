<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderEditRequest extends FormRequest
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
            'name' => 'bail|required|max:255|unique:sliders,name,'.$id,
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được trống',
            'name.unique' => 'Tên không được trùng',
            'name.max' => 'Tên không được quá 255 ký tự',
            'description.required' => 'Mô tả không được trống',
        ];
    }
}
