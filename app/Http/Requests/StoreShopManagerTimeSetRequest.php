<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreShopManagerTimeSetRequest extends FormRequest
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
            'ShopManagerId' => [
                'required'
            ],
            'Monday' => [
                Rule::in([0, 1]),
                'required'
            ],
            'Tuesday' => [
                Rule::in([0, 1]),
                'required'
            ],
            'Wednesday' => [
                Rule::in([0, 1]),
                'required'
            ],
            'Thursday' => [
                Rule::in([0, 1]),
                'required'
            ],
            'Friday' => [
                Rule::in([0, 1]),
                'required'
            ],
            'Saturday' => [
                Rule::in([0, 1]),
                'required'
            ],
            'Sunday' => [
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
