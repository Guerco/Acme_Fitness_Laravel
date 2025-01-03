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
            
            'tamanho' =>   [
                            'nullable', 
                            'max:50',
                        ] ,
            'peso' =>   [
                            'nullable', 
                            'max:50',
                        ] ,
            'cor' =>    [
                            'nullable' ,
                            'max:50',
                        ] ,
            'preco' =>  [
                            'required',
                            'numeric',      
                            'min:1',
                            'regex:/^\d+(\.\d{1,2})?$/' ,
                        ] ,   
            'estoque' =>   [
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
            
                'tamanho' =>   [
                                'nullable', 
                                'max:50',
                            ] ,
                'peso' =>   [
                                'nullable', 
                                'max:50',
                            ] ,
                'cor' =>    [
                                'nullable' ,
                                'max:50',
                            ] ,
                'preco' =>  [
                                'nullable',
                                'numeric',      
                                'min:1',
                                'regex:/^\d+(\.\d{1,2})?$/' ,

                            ] ,   
                'estoque' =>   [
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
}
