<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateKorisnika extends FormRequest
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
            'ime' => 'required|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,10}$/',
            'prezime' => 'required|regex:/^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,}$/',
            'email' => 'required|regex:/^[\w]+[\.\_\-\w\d]*\@gmail\.com$/',
            'ddlPol' => 'not_regex:/^[0]$/',
            'ddlUloga' => 'not_regex:/^[0]$/'
        ];
    }
    public function messages()
    {
        return [
            'ime.required' => 'Polje za ime je obavezno.',
            'ime.regex' => 'Ime mora da ima min 2 karaktera i max 10 i da pocne velikim slovom.',
            'prezime.required'  => 'Polje za prezime je obavezno.',
            'prezime.regex'  => 'Prezime mora da ima min 2 karaktera i da pocne velikim slovom.',
            'email.regex'  => 'E-mail mora da bude @gmail.com.',
            'email.required'  => 'Polje za email je obavezno.',
            'sifra.regex'  => 'Sifra nije u dobrom formatu.',
            'ddlPol.not_regex'  => 'Morate izabrati pol.',
            'ddlUloga.not_regex'  => 'Morate izabrati ulogu.',
        ];
    }
}
