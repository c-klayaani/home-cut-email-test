<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateShopManagerTimeSetRequest extends FormRequest
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
            'Monday' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Tuesday' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Wednesday' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Thursday' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Friday' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Saturday' => [
                Rule::in([0, 1]),
                'filled'
            ],
            'Sunday' => [
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
