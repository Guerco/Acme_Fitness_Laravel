<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'descontos' => [
                'nullable' ,
                'numeric' ,      
                'decimal:0,2' ,
                'min:0.01',
            ] ,
            'forma_pagamento' => [
                'required',
                'in:PIX,Boleto,Cartão (1x)'
            ],
            
            'cliente.id' => [
                'required' , 
                'integer' ,
                'exists:cliente,id' ,
            ] ,
            'endereco.id' => [
                'required' , 
                'integer' ,
                'exists:endereco,id' ,
            ] ,

            'variacoes' => [
                'required' , 
                'array' , 
                'min:1'
            ],
            'variacoes.*.variacao.id' => [
                'required' , 
                'integer' ,
                'exists:variacao,id' ,
            ],
            'variacoes.*.quantidade' => [
                'required' , 
                'integer' , 
                'min:1' ,
            ] ,
        ];
        
       return $rules;
    }

    public function messages(): array
    {
        return [
            'descontos.numeric' => 'Os descontos devem ser um número válido.',
            'descontos.decimal' => 'Os descontos devem possuir até 2 casas decimais, separadas por ponto.',
            'descontos.min' => 'Os descontos devem ser de no mínimo 0.01.',
            
            'forma_pagamento.required' => 'A forma de pagamento não foi informada.',
            'forma_pagamento.in' => 'A forma de pagamento deve ser PIX, Boleto ou Cartão (1x).',

            'cliente.id.required' => 'O ID de cliente não foi informado.',
            'cliente.id.integer' => 'O ID de cliente deve ser um número inteiro.',
            'cliente.id.exists' => 'Não há cliente com o ID informado.',
            
            'endereco.id.required' => 'O ID de endereço não foi informado.',
            'endereco.id.integer' => 'O ID de endereço deve ser um número inteiro.',
            'endereco.id.exists' => 'Não há endereço com o id informado.',
            
            'variacoes.required' => 'A lista de variações não foi informada.',
            'variacoes.array' => 'A lista de variações deve ser um array.',
            'variacoes.min' => 'A lista de variações deve conter pelo menos um elemento.',
            
            'variacoes.*.variacao.id.required' => 'O ID de variação não foi informado.',
            'variacoes.*.variacao.id.integer' => 'O ID de variação deve ser um número inteiro.',
            'variacoes.*.variacao.id.exists' => 'Não há variação com o ID informado.',
            
            'variacoes.*.quantidade.required' => 'A quantidade da variação não foi informada.',
            'variacoes.*.quantidade.integer' => 'A quantidade da variação deve ser um número inteiro.',
            'variacoes.*.quantidade.min' => 'A quantidade do produto deve ser no mínimo 1.',
        ];
    }
}
