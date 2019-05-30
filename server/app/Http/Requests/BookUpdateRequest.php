<?php

namespace App\Http\Requests;

class BookUpdateRequest extends Request
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
        $id = $this->routeParam('id');
        return [
            'name' => 'required|string|unique:books,name,' . $id,
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