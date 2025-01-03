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
            
            'nome' =>   [
                            'required', 
                            'max:50',
                        ] ,
            'imagem_path' =>   [
                            'nullable', 
                            'max:200',
                        ] ,
            'descricao' => [
                                'nullable' ,
                            ] ,
            'data_cadastro' =>  [
                                    'nullable',
                                    'date',
                                    'date_format:Y-m-d',
                                ] ,   
            'categoria.id' =>   [
                                    'required' , 
                                    'integer' ,
                                    'exists:categoria,id' ,
                                ] ,
        ];


        if ($this->method() === 'PUT') {
            $rules = [
            
                'nome' =>   [
                                'nullable', 
                                'max:50',
                            ] ,
                'imagem_path' =>   [
                                'nullable', 
                                'max:200',
                            ] ,
                'descricao' => [
                                    'nullable' ,
                                ] ,
                'data_cadastro' =>  [
                                        'nullable',
                                        'date',
                                        'date_format:Y-m-d',
                                    ] ,   
                'categoria.id' =>   [
                                        'nullable' , 
                                        'integer' ,
                                        'exists:categoria,id' ,
                                    ] ,
            ];
        }

        return $rules;
    }
}
