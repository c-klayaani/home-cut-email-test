<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
                'filled',
                Rule::unique('Users')->ignore($this->user)
            ],
            'Password' => [
                'string',
                'filled'
            ],
            'UserType' => [
                'string',
                'filled',
                Rule::in(['Admin', 'Shop Manager', 'Barber'])
            ],
            'Blocked' => [
                Rule::in([0, 1]),
                'filled'
            ]
        ];
    }

    /**
     * Get the error messagges if validation fails
     *
     * @return Response
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'messages' => $validator->errors()->all()
            ], 400)
        );
    }
}
