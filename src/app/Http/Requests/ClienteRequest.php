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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'nome' =>   'required', 
                        'max:50',
            'cpf' =>    'required',
                        'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'data_nascimento' =>    'required',
                                    'date',
                                    'date_format:Y-m-d',
        ];

        if ($this->method() === 'PUT') {
            $rules = [
                'nome' =>   'nullable', 
                            'max:50',
                'cpf' =>    'nullable',
                            'regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
                'data_nascimento' =>    'nullable',
                                        'date',
                                        'date_format:Y-m-d',    
            ];
        }

        return $rules;
    }
}
