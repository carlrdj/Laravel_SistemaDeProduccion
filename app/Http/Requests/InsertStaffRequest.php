<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertStaffRequest extends FormRequest
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
            'fullname' => ['required'],
            'email' => ['required'],
            'civil_status' => ['required'],
            'date' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'fullname.required' => 'Se requiere el nombre completo del personal.',
            'email.required' => 'Se requiere el correo electrónico del personal.',
            'civil_status.required' => 'Se requiere el estado civil del personal.',
            'date.required' => 'Se requiere la fecha de nacimiento del personal.'
        ];
    }
}
