<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUser extends FormRequest
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
    // public function rules()
    // {
    //     return [
    // 	  'name' => 'required',
    // 	  'email' => 'required|email',
    // 	  'password' => 'required',
    // 	  'c_password' => 'required|same:password',
    //   	];
    // }
    //
    // public function messages()
    // {
    //   return [
    //     'name.required' => 'É necessário fornecer um nome.',
    //     'nome.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
    //     'email.required' => 'É necessário preencher o campo de e-mail.',
    //     'email.email' => 'O e-mail não está no formato correto',
    //     'password.required' => 'É necessário entrar com uma senha.',
    //     'c_password.required' => 'Por favor confirme sua senha.',
    //     'c_password.same:password' => 'As senhas não batem.',
    //   ];
    // }
}
