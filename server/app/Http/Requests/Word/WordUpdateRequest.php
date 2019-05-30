<?php

namespace App\Http\Requests\Word;

use App\Http\Requests\Request;

class WordUpdateRequest extends Request
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
        $id = $this->request->get('id');
        return [
            'chinese' => 'required|string',
            'english' => 'required|string|unique:books,english,' . $id,
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