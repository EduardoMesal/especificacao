<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function subjectEmail()
    {
        return $this->routeIs('forgotPassword.action');
    }

    public function rules()
    {
        $isSubjectEmail = $this->subjectEmail();

        return [
            'email' =>  $isSubjectEmail ? 'required|email|exists:usuarios,email' : '',
            'password' =>  !$isSubjectEmail ? 'required|string|min:4|confirmed' : '',
            'password_confirmation' => !$isSubjectEmail ? 'required|string|min:4' : '',
        ];
    }

    public function messages()
    {
        return [
            'email.*' => 'Esse e-mail não foi encontrado!',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 4 caracteres.',
            'password.confirmed' => 'As senhas não correspondem.',
            'password_confirmation.required' => 'A confirmação da senha é obrigatória.',
            'password_confirmation.min' => 'A confirmação da senha deve ter pelo menos 4 caracteres.',
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()->withErrors($validator)->withInput()
        );
    }
}