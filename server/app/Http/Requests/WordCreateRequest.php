<?php

namespace App\Http\Requests;

class WordCreateRequest extends Request
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'word_list' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}