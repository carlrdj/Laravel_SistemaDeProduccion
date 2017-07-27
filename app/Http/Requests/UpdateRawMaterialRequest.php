<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRawMaterialRequest extends FormRequest
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
            'unit' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id de la materia prima.',
            'fullname.required' => 'Se requiere el nombre de la materia prima.',
            'unit.required' => 'Se requiere la unidad de la materia prima.'
        ];
    }
}
