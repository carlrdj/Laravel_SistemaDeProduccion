<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertUserRequest extends FormRequest
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
            'rol_id' => ['required'],
            'staff_id' => ['required'],
            'fullname' => ['required'],
            'username' => ['required'],
            'email' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'rol_id.required' => 'Se requiere el rol del usuario.',
            'staff_id.required' => 'Se requiere el id del personal.',
            'fullname.required' => 'Se requiere el nombre completo del usuario.',
            'username.required' => 'Se requiere el nickname del usuario.',
            'email.required' => 'Se requiere el correo electronico del usuario.'
        ];
    }
}
