<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'bail|required|max:255|min:5|unique:products,name,'.$id,
            'price' => 'bail|required|numeric|min:1',
            'category_id' => 'required',
            'contents' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Tên không được để trống',
            'name.unique'=>'Tên không được phép trùng',
            'name.max'=>'Tên không được phép quá 255 ký tự',
            'name.min'=>'Tên không được phép dưới 10 ký tự',
            'price.required' => 'Giá không được để trống',
            'price.numeric' => 'Giá chỉ được phép chứa chữ số',
            'price.min' => 'Giá phải trên 1 đồng',
            'category_id.required'=>'Danh mục không được phép để trống',
            'contents.required'=>'Nội dung không được phép để trống',
        ];
    }
}
