<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateCountryRequest extends FormRequest
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
                'filled',
                Rule::unique('Countries')->ignore($this->country)
            ],
            'ArName' => [
                'string',
                'filled',
                Rule::unique('Countries')->ignore($this->country)
            ],
            'Code' => [
                'string',
                'filled',
                Rule::unique('Countries')->ignore($this->country)
            ],
            'CurrrencyCode' => [
                'string',
                'filled'
            ],
            'ArCurrrencyCode' => [
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
