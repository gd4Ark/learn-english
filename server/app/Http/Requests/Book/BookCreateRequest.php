<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\Request;

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
            'name' => 'required|string|max:64|unique:books',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '名称字段为必填',
            'name.unique' => '该名称已占用！',
            'name.max' => '名称长度不可超过64个字符',
        ];
    }
}