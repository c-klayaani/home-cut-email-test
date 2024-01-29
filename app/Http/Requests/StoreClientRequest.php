<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreClientRequest extends FormRequest
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
                'required'
            ],
            'ArName' => [
                'string',
                'filled'
            ],
            'Email' => [
                'email',
                'required',
                'unique:Clients'
            ],
            'PhoneNumber' => [
                'string',
                'required',
                'unique:Clients'
            ],
            'Password' => [
                'string',
                'required'
            ],
            'CountryId' => [
                'required'
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
