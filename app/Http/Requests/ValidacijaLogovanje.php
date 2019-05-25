<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacijaLogovanje extends FormRequest
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
            'lSifra' => 'required|regex:/^[A-Z][\w\d]{5,}$/',
            'lEmail' => 'required|regex:/^[\w]+[\.\_\-\w\d]*\@gmail\.com$/'
        ];
    }
    public function messages()
    {
        return [
            'lSifra.required' => 'Polje za sifru je obavezno.',
            'lEmail.required'  => 'Polje za e-mail je obavezno.',
            'lEmail.regex'  => 'E-mail mora da bude @gmail.com.',
            'lSifra.regex'  => 'Sifra mora da sadrzi minimum 6 karaktera i da pocinje velikim slovom.',
        ];
    }
}
