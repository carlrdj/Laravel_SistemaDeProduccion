<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailOrderProduct extends FormRequest
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
            'quantity_delivered' => ['required', 'min:0', 'numeric'],
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id de detalle de pedido.',
            'quantity_delivered.required' => 'Se requiere la cantidad de producto(s) a solicitar.',
            'quantity_delivered.min' => 'Se requiere la cantidad de producto(s) a solicitar sea mayor a 0.',
            'quantity_delivered.numeric' => 'Se requiere la cantidad de producto(s) a solicitar se un valor numerico.'
        ];
    }
}
