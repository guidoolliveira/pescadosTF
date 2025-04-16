<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProduto extends FormRequest
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
            'peso' => 'required|numeric|gt:0|digits_between:1, 2',
            'quantidade' => 'required|numeric|min:1',
            'lote'       => 'required|string|max:50',
            'validade'   => 'required|date_format:Y-m-d|after:today',
        ];
        
        
        
    }
}
