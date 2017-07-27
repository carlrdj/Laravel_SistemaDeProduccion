<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertOrderRequest extends FormRequest
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
            'client_id' => ['required'],
            'priority' => ['required'],
            'date_delivery_estimated' => ['required'],
            'time_delivery_estimated' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'client_id.required' => 'Se requiere el id del cliente.',
            'priority.required' => 'Se requiere la prioridad del pedido.',
            'date_delivery_estimated.required' => 'Se requiere la fecha de entrega del pedido.',
            'time_delivery_estimated.required' => 'Se requiere la hora de entrega del pedido.'
        ];
    }
}
