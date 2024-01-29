<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAppointmentRequest extends FormRequest
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
                'filled'
            ],
            'BarberId' => [
                'filled'
            ],
            'AddressId' => [
                'filled'
            ],
            'AppointmentDate' => [
                'date',
                'filled'
            ],
            'Timeslot' => [
                'date_format:H:i',
                'filled'
            ],
            'CurCode' => [
                'filled'
            ],
            'Status' => [
                'filled'
            ],
            'PaymentMethod' => [
                'filled'
            ],
            'CountryId' => [
                'filled'
            ],
            'AddressName' => [
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
                'filled'
            ],
            'Building' => [
                'string',
                'filled'
            ],
            'FloorNb' => [
                'string',
                'filled'
            ],
            'PhoneNumber' => [
                'string',
                'filled'
            ],
            'AddressNotes' => [
                'string',
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
