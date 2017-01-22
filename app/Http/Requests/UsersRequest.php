<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:Users',
            'role_id' => 'required',
            'is_active' => 'required',
            'password' => 'required',
            'password2' => 'required|same:password'


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Se require un nombre',
            'email.required'  => 'Se requiere un email',
            'email.unique'  => 'El email ya existe',
            'role_id.required' => 'Se requiere un rol',
            'is_active.required'  => 'Se requiere un estado',
            'password.required' => 'Se requiere una contraseña',
            'password2.required' => 'Se requiere repetir la contraseña',
            'password2.same' => 'Debe coincidir la contraseña',
        ];
    }

}
