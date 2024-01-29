<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateServiceRequest extends FormRequest
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
                'filled',
                Rule::unique('Services')->where('CountryId', $this->CountryId)->ignore($this->Name, 'Name')
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
            'Price' => [
                'numeric',
                'filled'
            ],
            'Duration' => [
                'numeric',
                'filled'
            ],
            'Order' => [
                'numeric',
                'filled'
            ],
            'IsChecked' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Active' => [
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
