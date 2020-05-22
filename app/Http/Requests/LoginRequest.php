<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|unique|',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng điền email của bạn',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Vui lòng điền mật khẩu'

        ];
    }
}
