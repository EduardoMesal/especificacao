<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CriarEspecificacoesControllerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'cliente_id' => 'required',
            'status' => 'required',
            // 'caracteristicas.*.atributo_id' => 'required',
            'caracteristicas.*.atributo_id' => 'nullable|exists:atributos,id',
            'caracteristicas.*.observacao_personalizada' => 'nullable',
            'att' => 'nullable|array',
            'att.*.observacao' => 'required_with:att',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'Preencha o campo cliente.',
            'status.required' => 'Preencha o campo status.',
            // 'caracteristicas.*.atributo_id.required' => 'Selecione pelo menos um atributo.',
            'caracteristicas.*.atributo_id.exists' => 'O atributo selecionado não existe.',
            'att.*.observacao.required_with' => 'Preencha o campo observação.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $formattedErrors = [];
        foreach ($errors as $key => $messages) {
            if (preg_match('/^caracteristicas\.(\d+)\.(.+)$/', $key, $matches)) {
                $formattedKey = "caracteristicas[{$matches[1]}][{$matches[2]}]";
                $formattedErrors[$formattedKey] = $messages;
            } else {
                $formattedErrors[$key] = $messages;
            }

            if (preg_match('/^att\.(\d+)\.(.+)$/', $key, $matches)) {
                $formattedKey = "att[{$matches[1]}][{$matches[2]}]";
                $formattedErrors[$formattedKey] = $messages;
            } else {
                $formattedErrors[$key] = $messages;
            }
        }

        throw new HttpResponseException(response()->json([
            'success' => false,
            'title' => 'Oops...',
            'icon' => 'error',
            'message' => 'Por favor, verifique o(s) campo(s) sinalizados em vermelho.',
            'errors' => $formattedErrors,
        ], 422));
    }
}