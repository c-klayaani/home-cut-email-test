<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendNotificationRequest extends FormRequest
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
            'Title' => [
                'string',
                'required'
            ],
            'Body' => [
                'string',
                'required'
            ],
            'ArTitle' => [
                'string',
                'required'
            ],
            'ArBody' => [
                'string',
                'required'
            ],
            'CountryId' => [
                'filled'
            ]
        ];
    }
}
