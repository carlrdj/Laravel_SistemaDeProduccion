<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertProductionProductRequest extends FormRequest
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
            'product_id' => ['required'],
            'date_start' => ['required'],
            'quantity_estimated' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'product_id.required' => 'Se requiere el id de producto.',
            'date_start.required' => 'Se requiere la fecha de inicio de producción.',
            'quantity_estimated.required' => 'Se requiere la cantidad a producir.'
        ];
    }
}
