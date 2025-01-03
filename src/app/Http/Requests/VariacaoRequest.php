<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VariacaoRequest extends FormRequest
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
            
            'tamanho' => [
                'nullable', 
                'max:50',
            ] ,
            'peso' => [
                'nullable', 
                'max:50',
            ] ,
            'cor' => [
                'nullable' ,
                'max:50',
            ] ,
            'preco' => [
                'required' ,
                'numeric' ,      
                'decimal:0,2' ,
                'min:0.01',
            ] ,   
            'estoque' => [
                'required' , 
                'integer' ,
                'min:0'
            ] ,
            'produto.id' => [
                'required' , 
                'integer' ,
                'exists:produto,id' ,
            ] ,
        ];


        if ($this->method() === 'PUT') {
            $rules = [
            
                'tamanho' => [
                    'nullable', 
                    'max:50',
                ] ,
                'peso' => [
                    'nullable', 
                    'max:50',
                ] ,
                'cor' => [
                    'nullable' ,
                    'max:50',
                ] ,
                'preco' => [
                    'nullable' ,
                    'numeric' ,      
                    'decimal:0,2' ,
                    'min:0.1',
                ] ,  
                'estoque' => [
                    'nullable' , 
                    'integer' ,
                    'min:0'
                ] ,
                'produto.id' => [
                    'nullable' , 
                    'integer' ,
                    'exists:produto,id' ,
                ] ,
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'tamanho.max' => 'O tamanho deve possuir no máximo 50 caracteres.',
            
            'peso.max' => 'O peso deve possuir no máximo 50 caracteres.',

            'cor.max' => 'A tamanho deve possuir no máximo 50 caracteres.',

            'preco.required' => 'O preço não foi informado.',
            'preco.numeric' => 'O preço deve ser um número válido.',
            'preco.decimal' => 'O preço deve possuir até 2 casas decimais, separadas por ponto.',
            'preco.min' => 'O preço deve ser de no mínimo 0.01.',
            
            'estoque.required' => 'O estoque não foi informado.',
            'estoque.numeric' => 'O estoque deve ser um número válido.',
            'estoque.min' => 'O estoque deve ser de no mínimo 0.',

            'produto.id.required' => 'O ID de produto não foi informado.',
            'produto.id.integer' => 'O ID de produto deve ser um número inteiro.',
            'produto.id.exists' => 'Não há produto com o id informado.',
        ];
    }
}
