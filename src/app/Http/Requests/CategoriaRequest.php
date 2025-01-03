<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest 
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
            'nome' =>   'required', 
                        'max:50',
            'descricao' => 'nullable',
        ];

        if ($this->method() === 'PUT') {
            $rules = [
                'nome' =>   'nullable',
                            'max:50',
                'descricao' => 'nullable',
            ];
        }

        return $rules;
    }
}
