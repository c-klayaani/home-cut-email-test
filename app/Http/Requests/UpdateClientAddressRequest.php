<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientAddressRequest extends FormRequest
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
                'filled'
            ],
            'Name' => [
                'string',
                'filled'
            ],
            'City' => [
                'string',
                'filled'
            ],
            'FullAddress' => [
                'string',
                'filled'
            ],
            'Appartment' => [
                'string',
                'nullable'
            ],
            'Building' => [
                'string',
                'filled'
            ],
            'FloorNb' => [
                'string',
                'nullable'
            ],
            'PhoneNumber' => [
                'string',
                'filled'
            ],
            'Notes' => [
                'string',
                'nullable'
            ]
        ];
    }
}
