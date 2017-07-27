<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailProductionPlanningRawMaterialRequest extends FormRequest
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
            'ten' => ['required', 'numeric', 'min:0'],
            'twenty' => ['required', 'numeric', 'min:0'],
            'thirty' => ['required', 'numeric', 'min:0'],
            'forty' => ['required', 'numeric', 'min:0'],
            'fifty' => ['required', 'numeric', 'min:0'],
            'sixty' => ['required', 'numeric', 'min:0'],
            'seventy' => ['required', 'numeric', 'min:0'],
            'eighty' => ['required', 'numeric', 'min:0'],
            'ninety' => ['required', 'numeric', 'min:0'],
            'hundred' => ['required', 'numeric', 'min:0']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id de detalle de produccion.',
            'ten.required' => 'Se requiere la cantidad de materia prima.',
            'ten.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'ten.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',
            'twenty.required' => 'Se requiere la cantidad de materia prima.',
            'twenty.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'twenty.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',
            'thirty.required' => 'Se requiere la cantidad de materia prima.',
            'thirty.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'thirty.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'forty.required' => 'Se requiere la cantidad de materia prima.',
            'forty.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'forty.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'fifty.required' => 'Se requiere la cantidad de materia prima.',
            'fifty.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'fifty.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'sixty.required' => 'Se requiere la cantidad de materia prima.',
            'sixty.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'sixty.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'seventy.required' => 'Se requiere la cantidad de materia prima.',
            'seventy.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'seventy.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'eighty.required' => 'Se requiere la cantidad de materia prima.',
            'eighty.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'eighty.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'ninety.required' => 'Se requiere la cantidad de materia prima.',
            'ninety.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'ninety.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',            
            'hundred.required' => 'Se requiere la cantidad de materia prima.',
            'hundred.numeric' => 'Se requiere la cantidad de materia prima sea numerico.',
            'hundred.min' => 'Se requiere la cantidad de materia prima sea mayor a 0.',
        ];
    }
}
