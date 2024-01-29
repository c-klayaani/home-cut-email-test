<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateBarberRequest extends FormRequest
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
            'Description' => [
                'string',
                'filled'
            ],
            'ArDescription' => [
                'string',
                'filled'
            ],
            'Email' => [
                'email',
                'filled',
                Rule::unique('Barbers')->ignore($this->barber)
            ],
            'PhoneNumber' => [
                'string',
                'filled',
                Rule::unique('Barbers')->ignore($this->barber)
            ],
            'Photo' => [
                'string',
                'filled'
            ],
            'PhotoPreview' => [
                'string',
                'filled'
            ],
            'ShopManagerId' => [
                'filled'
            ],
            'Order' => [
                'numeric',
                'filled'
            ],
            'Location' => [
                'string',
                'filled'
            ],
            'ArLocation' => [
                'string',
                'filled'
            ],
            'BufferTime' => [
                'numeric',
                'filled'
            ],
            'WorkFrom' => [
                'date_format:H:i',
                'filled'
            ],
            'WorkTill' => [
                'date_format:H:i',
                'filled'
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
