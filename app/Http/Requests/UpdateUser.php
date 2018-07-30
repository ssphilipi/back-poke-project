<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UpdateUser extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response()->json($validator->errors(),
      422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'string',
          'email' => 'email|unique:users',
          'pokemon' => 'string',
          'codigo' => 'digits:8|unique:users,codigo,'.$this->user->id,
        ];
    }

    public function messages()
    {
      return [
        'name.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
        'email.email' => 'O e-mail não está no formato correto',
        'email.unique:users' => 'O e-mail já foi cadastrado',
        'codigo.digits' => 'O código deve possuir 8 caracteres numéricos.',
        'codigo.unique' => 'Este código já existe.',
      ];
    }
}
