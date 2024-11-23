<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEstoque extends FormRequest
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
        return [
            'nome' => 'required|string|max:255', 
            'quantidade' => 'required|numeric|gt:0|digits_between:1, 4',
            'lote' => 'required|date|date_format:Y-m-d',
            'validade' => 'required|date|date_format:Y-m-d'
        ];
        
        
        
    }
}
