<?php

namespace App\Http\Requests;

class BookCreateRequest extends Request
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
            'name' => 'required|string|unique:books',
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