<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnosPostaRequest extends FormRequest
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
            'ddlKategorije'=>'required|exists:kategorijaposta,idKategorija',
            'naslov'=>'required|min:10',
            'slikaPosta'=>'required|file|image|max:2000',
            'opis'=>'required|min:10'
        ];
    }
    public function messages()
    {
        return [
            'ddlKategorije.required' => 'Polje za kategoriju posta je obavezno.',
            'ddlKategorije.exists' => 'Ne postoji ta kategorija koju ste izabrali.',
            'naslov.required' => 'Polje za naslov je obavezno.',
            'naslov.min' => 'Polje za naslov mora da sadrzi minimalno 10 karaktera.',
            'slikaPosta.required' => 'Polje za sliku je obavezno.',
            'slikaPosta.image' => 'Slika nije u dobrom formatu.',
            'slikaPosta.max' => 'Maksimalna velicina slike je 2 MB.',
            'opis.required' => 'Polje za opis je obavezno.',
            'opis.min' => 'Polje za opis mora da sadrzi min 10 karaktera.',
        ];
    }
}
