<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidNews extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'text' => 'required|string|min:10'
            'isPrivate' => 'boolean',
            'category_id' => 'required|exists:App\Models\Category,id',
        ];
    }

}
