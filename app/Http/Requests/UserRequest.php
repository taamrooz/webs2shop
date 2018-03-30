<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            return [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'user_level' => 'required|digits_between:1,2'
            ];
            case 'PATCH':
            return [
                'name' => 'required|string|max:100',
                'email' => 'required|email',
                'password' => 'required|string|min:6|confirmed'
                'user_level' => 'required|digits_between:1,2'
            ];
            break;
            
            default:
            return [
                'name' => 'required|string|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed'
                'user_level' => 'required|digits_between:1,2'
            ];
            
        }
        
    }
    public function messages()
    {
        return [
            'name.required' => 'Je moet een naam meegeven',
            'name.string' => 'De naam mag alleen bestaan uit karakters.',
            'name.max' => 'De naam mag bestaan uit maximaal :max karakters',

            'email.required' => 'Je moet een :attribute meegeven',
            'email.email' => 'De :attribute moet een email zijn',
            'email.unique' => 'De :attribute is al bezet',

            'password.required' => 'Je moet een wachtwoord meegeven',
            'password.string' => 'Het wachtwoord mag alleen bestaan uit karakters.',
            'password.min' => 'Het wachtwoord moet tenminste bestaan uit 6 karakters',
            'password.confirmed' => 'De wachtwoorden komen niet overeen',

            'user_level.required' => 'Je moet een gebruiker level meegeven',
            'user_level.digits_between' => 'Het gebruikers level is :min of :max',
        ];
    }
}
