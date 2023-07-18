<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerrequest extends FormRequest
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
            'username' => 'required|max:25',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Invalid',
            'email.required' => 'Invalid',
            'email.email' => 'Invalid',
            'email.unique' => 'Taken',
            'password.required' => 'Invalid',
        ];
    }
}
