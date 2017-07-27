<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
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
            'position' => ['required']
        ];
    }
    
    public function messages()
    {
        return [
            'id.required' => 'Se requiere el id del cargo.',
            'position.required' => 'Se requiere el nombre del cargo.'
        ];
    }
}
