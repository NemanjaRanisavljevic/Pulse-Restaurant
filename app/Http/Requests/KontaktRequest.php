<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KontaktRequest extends FormRequest
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
            'naslov'=>'required',
            'poruka'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'naslov.required' => 'Polje za naslov je obavezno.',
            'poruka.required' => 'Polje za poruku je obavezno.',

        ];
    }
}
