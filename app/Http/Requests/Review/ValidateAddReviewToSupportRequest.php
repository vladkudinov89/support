<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAddReviewToSupportRequest extends FormRequest
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

    public function rules()
    {
        return [
            'description' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'A description is required',
            'description.min' => 'Must be min 10 letters in review\'s message',
        ];
    }
}
