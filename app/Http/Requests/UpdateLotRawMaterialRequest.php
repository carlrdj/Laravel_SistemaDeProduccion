<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLotRawMaterialRequest extends FormRequest
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
            'raw_material_id' => ['required'],
            'before_quantity' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'min:0'],
            'date_entry' => ['required'],
            'date_expiration' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id de el lote de materia prima.',
            'raw_material_id.required' => 'Se requiere el id de materia prima.',
            'quantity.required' => 'Se requiere que la cantidad de materia prima a ingresar.',
            'quantity.numeric' => 'Se requiere que la cantidad de materia prima sea numerico.',
            'quantity.min' => 'Se requiere que la cantidad de materia prima sea mayor a 1.',
            'date_entry.required' => 'Se requiere la fecha de ingreso de materia prima.',
            'date_expiration.required' => 'Se requiere la fecha de caducidad de materia prima.'
        ];
    }
}
