<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductionProductRequest extends FormRequest
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
            'date_start' => ['required'],
            'quantity_estimated' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id de produccion.',
            'date_start.required' => 'Se requiere la fecha de inicio de producción.',
            'quantity_estimated.required' => 'Se requiere la cantidad a producir.'
        ];
    }
}
