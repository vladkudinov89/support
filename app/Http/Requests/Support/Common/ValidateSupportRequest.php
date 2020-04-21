<?php

namespace App\Http\Requests\Support\Common;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSupportRequest extends FormRequest
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
            'title' => 'required|min:2',
            'message' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'message.required' => 'A message is required',
            'title.min' => 'Must be min 2 letters in support\'s title',
            'message.min' => 'Must be min 10 letters in support\'s message',
        ];
    }
}
