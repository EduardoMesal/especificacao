<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('id'); // Captura o {id} da rota (se estiver presente)

        $isEdit = $userId !== null; // Se tiver ID, é edição

        return [
            'nome' => 'required',
            'email' => [
                'required',
                'email',
                $isEdit
                    ? Rule::unique('usuarios')->ignore($userId)
                    : Rule::unique('usuarios')
            ],
            'tipo' => 'required',
            'password' => $isEdit ? 'nullable|string|min:4|confirmed' : 'required|string|min:4|confirmed',
            'password_confirmation' => $isEdit ? 'nullable|string|min:4' : 'required|string|min:4',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo nome.',
            'email.required' => 'Preencha o campo email.',
            'email.unique' => 'Este endereço de e-mail já está sendo usado.',
            'email.email' => 'Por favor, informe um e-mail válido.',
            'tipo.required' => 'Preencha o campo tipo.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 4 caracteres.',
            'password.confirmed' => 'As senhas não correspondem.',
            'password_confirmation.required' => 'A confirmação da senha é obrigatória.',
            'password_confirmation.min' => 'A confirmação da senha deve ter pelo menos 4 caracteres.',
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
