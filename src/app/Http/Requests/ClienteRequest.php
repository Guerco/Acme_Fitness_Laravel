<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nome' => [
                'required', 
                'max:50',
            ] ,
            'cpf' => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            ] ,    
            'data_nascimento' => [
                'required',
                'date',
                'date_format:Y-m-d',
            ] ,    
        ];

        if ($this->method() === 'PUT') {
            $rules = [
                'nome' => [
                    'nullable', 
                    'max:50',
                ] ,
                'cpf' => [
                    'nullable',
                    'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
                ] ,    
                'data_nascimento' => [
                    'nullable',
                    'date',
                    'date_format:Y-m-d',
                ] ,
            ];
        }

        return $rules;
    }

    public function messages() : array {
        return [
            'nome.required' => 'O nome não foi informado.',
            'nome.max' => 'O nome deve possuir no máximo 50 caracteres.',

            'cpf.required' => 'O cpf não foi informado.' ,
            'cpf.regex' => 'O cpf deve seguir o fomato \'XXX.XXX.XXX-XX\'.' ,

            'data_nascimento.required' => 'A data de nascimento não foi informada.' ,
            'data_nascimento.date' => 'A data de nascimento deve ser uma data válida.' ,
            'data_nascimento.date_format' => 'A data de nascimento deve seguir o formato \'AAAA-mm-dd\'.' ,
            
        ];
    }
}
