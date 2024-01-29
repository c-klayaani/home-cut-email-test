<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBarberRequest extends FormRequest
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
            'Description' => [
                'string',
                'required'
            ],
            'ArDescription' => [
                'string',
                'filled'
            ],
            'Email' => [
                'email',
                'required',
                'unique:Barbers'
            ],
            'PhoneNumber' => [
                'string',
                'required',
                'unique:Barbers'
            ],
            'Photo' => [
                'string',
                'required'
            ],
            'PhotoPreview' => [
                'string',
                'required'
            ],
            'ShopManagerId' => [
                'required'
            ],
            'Order' => [
                'numeric',
                'required'
            ],
            'Location' => [
                'string',
                'required'
            ],
            'ArLocation' => [
                'string',
                'filled'
            ],
            'BufferTime' => [
                'numeric',
                'required'
            ],
            'WorkFrom' => [
                'date_format:H:i',
                'required'
            ],
            'WorkTill' => [
                'date_format:H:i',
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
