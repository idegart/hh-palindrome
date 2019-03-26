<?php

namespace App\Http\Requests\API\Palindrome;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'q' => [
                'string',
                'min:1',
                'max:300'
            ]
        ];
    }
}
