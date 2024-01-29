<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
            'Username' => [
                'string',
                'required',
                'unique:Users'
            ],
            'Password' => [
                'string',
                'required'
            ],
            'UserType' => [
                'string',
                'required',
                Rule::in(['Admin', 'Shop Manager', 'Barber'])
            ]
        ];
    }
}
