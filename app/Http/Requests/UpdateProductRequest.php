<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'price' => ['required', 'numeric', 'min:0']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id del producto.',
            'fullname.required' => 'Se requiere el nombre completo del producto.',
            'price.required' => 'Se requiere el precio del producto.',
            'price.numeric' => 'Se requiere que el precio del producto sea numerico.',
            'price.min' => 'Se requiere el precio del producto sea mayor a 0.'
        ];
    }
}
