<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Trainer;

class UpdateTrainer extends FormRequest
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
          'nome' => 'string',
          'pokemon' => 'string',
          'codigo' => 'digits:8|unique:trainers,codigo,'.$this->trainer->id,
        ];
    }

    public function messages()
    {
      return [
        'nome.alpha' => 'O nome deve consistir apenas de caracteres alfabéticos.',
        'codigo.digits' => 'O código deve possuir 8 caracteres numéricos.',
        'codigo.unique' => 'Este código já existe.',
      ];
    }
}
