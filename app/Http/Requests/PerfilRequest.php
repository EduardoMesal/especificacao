<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PerfilRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'nome' => 'required',
            'password' => 'nullable|min:4|confirmed',
            'password_confirmation' => 'nullable|min:4',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo nome.',
            'password.min' => 'A senha deve ter pelo menos 4 caracteres.',
            'password_confirmation.min' => 'As senhas devem ser iguais.',
            'password.confirmed' => 'As senhas devem ser iguais.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'title' => 'Oops...',
            'icon' => 'error',
            'message' => 'Por favor, verifique o(s) campo(s) sinalizados em vermelho.',
            'errors' => $validator->errors(),
        ], 422));
    }
}
