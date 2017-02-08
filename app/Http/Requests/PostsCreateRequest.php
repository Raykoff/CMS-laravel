<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsCreateRequest extends FormRequest
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
            //
            'category_id' => 'required',
            'photo_id' => 'required',
            'title' => 'required',
            'body' => 'required|min:200'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Se require una categoría',
            'photo_id.required' => 'Se require una foto',
            'title.required' => 'Se require un titulo',
            'body.required' => 'Se require un texto',
            'body.min' => 'Minimo 200 caracteres de texto',

    ];
    }
}
