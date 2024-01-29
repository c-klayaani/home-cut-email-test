<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreAppointmentWithDetailsRequest extends FormRequest
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
            'BarberId' => [
                'required'
            ],
            'AddressId' => [
                'required'
            ],
            'AppointmentDate' => [
                'date',
                'required'
            ],
            'Timeslot' => [
                'date_format:H:i',
                'required'
            ],
            'CurCode' => [
                'required'
            ],
            'PaymentMethod' => [
                'required'
            ],
            // DETAILS
            'Services' => [
                'array',
                'required'
            ],
            'Services.*.Id' => [
                'required'
            ],
            'Services.*.Quantity' => [
                'required'
            ],
            'Services.*.Price' => [
                'required'
            ],
            'Services.*.Duration' => [
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
