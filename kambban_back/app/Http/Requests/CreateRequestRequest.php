<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'description' => ['required', 'string'],
            'requesttype_id' => ['required', 'exists:requests_types,id'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
