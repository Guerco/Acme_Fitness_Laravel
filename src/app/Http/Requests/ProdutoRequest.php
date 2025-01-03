<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'imagem_path' => [
                'nullable', 
                'max:200',
            ] ,
            'descricao' => [
                'nullable' ,
            ] ,
            'data_cadastro' => [
                'nullable',
                'date',
                'date_format:Y-m-d',
            ] ,   
            'categoria.id' => [
                'required' , 
                'integer' ,
                'exists:categoria,id' ,
            ] ,
        ];


        if ($this->method() === 'PUT') {
            $rules = [
            
                'nome' => [
                    'nullable', 
                    'max:50',
                ] ,
                'imagem_path' => [
                    'nullable', 
                    'max:200',
                ] ,
                'descricao' => [
                    'nullable' ,
                ] ,
                'data_cadastro' => [
                    'nullable',
                    'date',
                    'date_format:Y-m-d',
                ] ,   
                'categoria.id' => [
                    'nullable' , 
                    'integer' ,
                    'exists:categoria,id' ,
                ] ,
            ];
        }

        return $rules;
    }

    public function messages() :array {
        return [
            'nome.required' => 'O nome não foi informado.' ,
            'nome.max' => 'O nome deve possuir no máximo 50 caracteres.' ,
            
            'imagem_path.max' => 'O caminho da imagem deve possuir no máximo 200 caracteres.' ,
        
            'data_cadastro.date' => 'A data de cadastro deve ser uma data válida.' ,
            'data_cadastro.date_format' => 'A data de cadastro deve seguir o formato \'AAAA-mm-dd\'.' ,
            
            'categoria.id.required' => 'O ID de categoria não foi informado.' ,
            'categoria.id.integer' => 'O ID de categoria deve ser um número inteiro.' ,
            'categoria.id.exists' => 'Não há categoria com o ID informado..' ,
        ];
    }
}
