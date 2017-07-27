<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailProductionProductLotRawMaterialRequest extends FormRequest
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
            'production_product_id' => ['required'],
            'raw_material_id' => ['required'],
            'lot_raw_material_id' => ['required'],
            'quantity' => ['required', 'numeric', 'min:-1']
        ];
    }
    
    public function messages()
    {
        return [
            'production_product_id.required' => 'Se requiere el id de producción.',
            'raw_material_id.required' => 'Se requiere el id de materia prima.',
            'lot_raw_material_id.required' => 'Se requiere el id de el lote de materia prima.',
            'raw_material_id.required' => 'Se requiere el id de materia prima.',
            'quantity.required' => 'Se requiere que la cantidad de materia prima a ingresar.',
            'quantity.numeric' => 'Se requiere que la cantidad de materia prima sea numerico.',
            'quantity.min' => 'Se requiere que la cantidad de materia prima sea mayor o igual a 0.'
        ];
    }
}
