<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'id' => ['required'],
            'fullname' => ['required'],
            'document_type' => ['required'],
            'number' => ['required'],
            'email' => ['required'],
            'phone_number' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id del cliente.',
            'fullname.required' => 'Se requiere el nombre completo del cliente.',
            'document_type.required' => 'Se requiere el tipo de documento del cliente.',
            'number.required' => 'Se requiere el numero de documento del cliente.',
            'email.required' => 'Se requiere el correo electrónico del personal.',
            'phone_number.required' => 'Se requiere el teléfono del cliente.'
        ];
    }
}
