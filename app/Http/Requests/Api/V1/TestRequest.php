<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return 
        [
            'questions.*.id'        => 'required|exists:questions',
            'questions.*.answer_id' => 'required|exists:answers,id',
        ];
    }
}
