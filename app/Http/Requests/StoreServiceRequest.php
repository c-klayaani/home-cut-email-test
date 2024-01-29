<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
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
            'CountryId' => [
                'required'
            ],
            'Name' => [
                'string',
                'required'
            ],
            'ArName' => [
                'string',
                'filled'
            ],
            'Description' => [
                'string',
                'required'
            ],
            'ArDescription' => [
                'string',
                'filled'
            ],
            'Price' => [
                'numeric',
                'required'
            ],
            'Duration' => [
                'numeric',
                'required'
            ],
            'Order' => [
                'numeric',
                'required'
            ],
            'Active' => [
                Rule::in([0, 1]),
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
