<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtisakRequest extends FormRequest
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
            'utisak' => 'required|max:312'
        ];
    }
    public function messages()
    {
        return [
            'utisak.required' => 'Polje za utisak je obavezno.',
            'utisak.max' => 'Uneli ste previse karaktera. Maksimalan broj je 312.',
        ];
    }
}
