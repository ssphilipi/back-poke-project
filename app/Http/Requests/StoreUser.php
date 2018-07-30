<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUser extends FormRequest
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

    public function rules()
    {
      return [
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required',
    	  'c_password' => 'required|same:password',
        'pokemon' => 'required|string',
        'codigo' => 'required|digits:8|unique:users,codigo,',
      ];
    }

    public function messages()
    {
      return [
        'name.required' => 'É necessário fornecer um nome.',
        'name.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
        'email.required' => 'É necessário preencher o campo de e-mail.',
        'email.email' => 'O e-mail não está no formato correto',
        'email.unique:users' => 'O e-mail já foi cadastrado',
        'password.required' => 'É necessário entrar com uma senha.',
        'c_password.required' => 'Por favor confirme sua senha.',
        'c_password.same:password' => 'As senhas não batem.',
        'codigo.digits' => 'O código deve possuir 8 caracteres numéricos.',
        'codigo.unique' => 'Este código já existe.',
      ];
    }
