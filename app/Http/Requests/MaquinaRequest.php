<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class MaquinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'ncm' => 'required',
            'equipamento_id' => 'required|exists:equipamento_origem,id',
            'caracteristicas' => 'required|array',
            // 'caracteristicas.*' => 'exists:caracteristicas,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo nome.',
            'ncm.required' => 'Preencha o campo ncm.',
            'equipamento_id.required' => 'Preencha o campo equipamento de origem.',
            'equipamento_id.exists' => 'O equipamento de origem selecionado não existe.',
            'caracteristicas.required' => 'Selecione pelo menos uma característica.',
            // 'caracteristicas.*.exists' => 'Uma ou mais características selecionadas são inválidas.',
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
