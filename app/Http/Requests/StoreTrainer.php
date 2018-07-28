<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTrainer extends FormRequest
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
            'nome' => 'required|string',
            'pokemon' => 'required|string',
            'codigo' => 'required|digits:8|unique:trainers,codigo'
        ];
    }

    public function messages()
    {
      return [
        'nome.required' => 'É necessário fornecer um nome.',
        'nome.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
        'pokemon.required' => 'É necessário fornecer um pokémon inicial.',
        'codigo.required' => 'É necessário fornecer um código de identificação.',
        'codigo.digits' => 'O código deve possuir 8 caracteres numéricos.',
        'codigo.unique' => 'Este código já existe.',
      ];
    }
}
