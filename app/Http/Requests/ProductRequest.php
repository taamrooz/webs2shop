<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user() === null){
            return false;
        }
        return \Auth::user()->user_level === 2;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titel' => 'required|string|max:40',
            'beschrijving' => 'required|string|max:2000',
            'prijs' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,bmp,tiff|max:4096'
        ];
    }
    public function messages()
    {
        return [
            //Title messages
            'titel.required' => 'Je moet een :attribute meegeven',
            'titel.string' => 'De :attribute mag alleen bestaan uit karakters.',
            'titel.max' => 'De :attribute mag niet langer zijn dan :max karakters.',

            //Beschrijving messages
            'beschrijving.required' => 'Je moet een :attribute meegeven',
            'beschrijving.string' => 'De :attribute mag alleen bestaan uit karakters.',
            'beschrijving.max' => 'De :attribute mag niet langer zijn dan :max karakters.',

            //Prijs messages
            'prijs.required' => 'Je moet een :attribute meegeven',
            'prijs.numeric' => 'De :attribute mag alleen bestaan uit cijfers.',

            //Image messages
            'image.required' => 'Je moet een foto meegeven',
            'image.mimes' => 'Alleen jpeg, png, bmp en tiff zijn toegestaan als bestanden'
        ];
    }
}
