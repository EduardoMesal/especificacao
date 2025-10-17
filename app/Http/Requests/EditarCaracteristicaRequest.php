<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EditarCaracteristicaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nome' => 'required',
            'secao_id' => 'required',
            'tipo' => 'required',
        ];

        if ($this->tipo != 'texto') {
            $rules['att'] = 'required|array';
            $rules['att.*.atributo'] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo nome.',
            'secao_id.required' => 'Preencha o campo seção.',
            'tipo.required' => 'Preencha o campo tipo.',
            'att.required' => 'É necessário preencher pelo menos um atributo.',
            'att.*.atributo.required' => 'Preencha o campo atributo.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $formattedErrors = [];

        foreach ($errors as $key => $messages) {
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
