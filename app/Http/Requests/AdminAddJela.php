<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAddJela extends FormRequest
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
            'obrok'=>'required|exists:obrok,idObrok',
            'naslov'=>'required',
            'sastojci'=>'required',
            'cena'=>'required|regex:/^[1-9][0-9]*$/',
        ];
    }

    public function messages()
    {
        return [
            'obrok.required' => 'Polje za obrok je obavezno.',
            'obrok.exists' => 'Polje za obrok je obavezno.',
            'naslov.required' => 'Polje za naslov je obavezno.',
            'sastojci.required' => 'Polje za sastojci je obavezno.',
            'cena.required'=> 'Polje za cenu je obavezno',
            'cena.regex'=> 'Samo brojeve mozete da unesete',

        ];
    }
}
