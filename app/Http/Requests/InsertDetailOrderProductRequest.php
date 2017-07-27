<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertDetailOrderProductRequest extends FormRequest
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
            'order_id' => ['required'],
            'product_id' => ['required'],
            'lot_product_id' => ['required'],
            'quantity_order' => ['required', 'min:0', 'numeric'],
        ];
    }
    
    public function messages()
    {
        return [
            'order_id.required' => 'Se requiere el id de pedido.',
            'product_id.required' => 'Se requiere el id de producto.',
            'lot_product_id.required' => 'Se requiere el id de lote de producto.',
            'quantity_order.required' => 'Se requiere la cantidad de producto(s) a solicitar.',
            'quantity_order.min' => 'Se requiere la cantidad de producto(s) a solicitar sea mayor a 0.',
            'quantity_order.numeric' => 'Se requiere la cantidad de producto(s) a solicitar se un valor numerico.'
        ];
    }
}
