<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class EspecificacoesControllerRequest extends FormRequest
{
    protected function isEdit(): bool
    {
        return $this->routeIs('Especificacoes.editar_action');
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('id');

        return [
            // 'pedido_id' => 'required',
            'caracteristicas.*.observacao_personalizada' => 'nullable',
            'att' => 'nullable|array',
            'att.*.observacao' => 'required_with:att',
            'caracteristicas.*.atributo_id' => $id
                ? 'nullable|exists:atributos,id'
                : 'required|exists:atributos,id',

            'serie' => [
                'nullable',
                Rule::unique('especificacoes', 'serie')->where('excluido', null)
                    ->ignore($id, 'id'),
            ],
        ];
    }
    public function messages()
    {
        $isEdit = $this->isEdit();
        
        $messages = [
            // 'pedido_id.required' => 'Preencha o campo pedido.',
            'att.*.observacao.required_with' => 'Preencha o campo observação.',
            'serie.unique' => 'Já existe uma serie com esse valor.',
        ];

        if ($isEdit) {
            $messages['caracteristicas.*.atributo_id.exists'] = 'O atributo selecionado não existe.';
        }
        
        return $messages;
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