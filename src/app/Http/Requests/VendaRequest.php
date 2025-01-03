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
                'min:0.1',
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
}
