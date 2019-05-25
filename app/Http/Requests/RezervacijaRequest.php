<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RezervacijaRequest extends FormRequest
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
            'datum'=>'required',
            'brojOsoba'=>'required|regex:/^[1-9][0-9]{0,2}$/',
            'vreme' => 'not_regex:/^[0]$/'
        ];
    }
    public function messages()
    {
        return [
            'datum.required' => 'Polje za datum je obavezno.',
            'datum.date' => 'Datum nije regularan',
            'brojOsoba.required'=>'Polje za broj osoba je obavezno.',
            'brojOsoba.regex'=>'Maksimalan broj je 99 osoba',
            'vreme.not_regex'=>'Morate izabrati vreme rezervacije.',
        ];
    }
}
