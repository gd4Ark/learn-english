<?php

namespace App\Http\Requests\Word;

use App\Http\Requests\Request;

class WordGetRequest extends Request
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
            'book_id' => 'required|exists:books,id',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'book_id.required' => '必须指定单词本ID',
            'book_id.exists' => '该单词本不存在！',
        ];
    }
}