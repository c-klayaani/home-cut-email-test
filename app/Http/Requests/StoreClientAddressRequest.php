<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreClientAddressRequest extends FormRequest
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
            'ClientId' => [
                'required'
            ],
            'Name' => [
                'string',
                'required'
            ],
            'CountryId' => [
                'required'
            ],
            'City' => [
                'string',
                'required'
            ],
            'FullAddress' => [
                'string',
                'required'
            ],
            'Building' => [
                'string',
                'required'
            ],
            'PhoneNumber' => [
                'string',
                'required'
            ],
            'Notes' => [
                'string',
                'nullable'
            ],
            'Appartment' => [
                'string',
                'nullable'
            ],
            'FloorNb' => [
                'string',
                'nullable'
            ],
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
