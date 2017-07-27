<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishedProductionProductRequest extends FormRequest
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
            'date_end' => ['required'],
            'quantity_real' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id de produccion.',
            'date_end.required' => 'Se requiere la fecha de finalización.',
            'quantity_real.required' => 'Se requiere la cantidad producida.'
        ];
    }
}
