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
            'titel' => 'required|string|max:40',
            'beschrijving' => 'required|string|max:2000',
            'prijs' => 'required|numeric',
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
            'prijs.numeric' => 'De :attribute mag alleen bestaan uit cijfers.'
        ];
    }
}
