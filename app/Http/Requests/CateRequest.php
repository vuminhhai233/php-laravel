<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
        return [
            'txtCateName' => 'required|max:10',
            'txtCateName' => 'unique:category,name'
           
        ];
    }
    public function messages()
    {
        return [
           "txtCateName.required"=> "Vui lòng nhập tên danh mục",
           'txtCateName.max' => 'Vượt quá 10 kí tự',
           "txtCateName.unique"    => "Danh mục đã tồn tại",

        ];
    }
}
