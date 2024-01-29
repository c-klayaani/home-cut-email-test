<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
            'Name' => [
                'string',
                'filled'
            ],
            'ArName' => [
                'string',
                'filled'
            ],
            'Email' => [
                'email',
                'filled',
                Rule::unique('Clients')->ignore($this->client)
            ],
            'PhoneNumber' => [
                'string',
                'filled',
                Rule::unique('Clients')->ignore($this->client)
            ],
            'Password' => [
                'string',
                'filled'
            ],
            'CountryId' => [
                'filled'
            ],
            'Blocked' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'PhoneVerified' => [
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
