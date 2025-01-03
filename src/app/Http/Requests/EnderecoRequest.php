<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'logradouro' => [
                'required',
                'max:50'
            ] ,
            'cidade' => [
                'required',
                'max:50'
            ] ,
            'bairro' => [
                'required',
                'max:50'
            ] ,
            'numero' => [
                'required',
                'max:10'
            ] ,
            'cep' => [
                'required',
                'regex:/^\d{5}\-\d{3}$/'
            ] ,
            'complemento' => [
                'nullable',
                'max:50'
            ] ,
        ];

        if ($this->method() === 'PUT') {
            $rules = [
                'logradouro' => [
                    'nullable',
                    'max:50'
                ] ,
                'cidade' => [
                    'nullable',
                    'max:50'
                ] ,
                'bairro' => [
                    'nullable',
                    'max:50'
                ] ,
                'numero' => [
                    'nullable',
                    'max:10'
                ] ,
                'cep' => [
                    'nullable',
                    'regex:/^\d{5}\-\d{3}$/'
                ] ,
                'complemento' => [
                    'nullable',
                    'max:50'
                ] ,  
            ];
        }

        return $rules;
    }

    public function messages() : array {
        return [
            'logradouro.required' => 'O logradouro não foi informado.',
            'logradouro.max' => 'O logradouro deve possuir no máximo 50 caracteres.',

            'cidade.required' => 'Acidade não foi informado.',
            'cidade.max' => 'A cidade deve possuir no máximo 50 caracteres.',

            'bairro.required' => 'O bairro não foi informado.',
            'bairro.max' => 'O bairro deve possuir no máximo 50 caracteres.',
            
            'numero.required' => 'O numero não foi informado.',
            'numero.max' => 'O numero deve possuir no máximo 10 caracteres.',

            'cep.required' => 'O cep não foi informado.' ,
            'cep.regex' => 'O cep deve seguir o fomato \'XXXXX-XXX\'.' ,

            'complemento.max' => 'O complemento deve possuir no máximo 50 caracteres.',

        ];
    }
}
