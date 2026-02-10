<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class MaquinaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $maquinaId = $this->route('id');

        return [
            'nome' => [
                'required',
                 Rule::unique('maquinas_idiomas', 'nome')
                    ->whereIn('maquina_id', function ($query) {
                        $query->select('id')
                            ->from('maquinas')
                            ->whereNull('excluido');
                    })
                    ->ignore($maquinaId, 'maquina_id'),
            ],
            'ncm' => 'required',
            'equipamento_id' => 'required|exists:equipamento_origem,id',
            'caracteristicas' => 'required|array',
            'imagens.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // 'caracteristicas.*' => 'exists:caracteristicas,id',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo nome.',
            'nome.unique' => 'Já existe uma máquina com esse nome.',
            'ncm.required' => 'Preencha o campo ncm.',
            'equipamento_id.required' => 'Preencha o campo equipamento de origem.',
            'equipamento_id.exists' => 'O equipamento de origem selecionado não existe.',
            'caracteristicas.required' => 'Selecione pelo menos uma característica.',
            'imagens.*.image' => 'Por favor, selecione uma imagem válida.',
            'imagens.*.mimes' => 'Os formatos de imagem válidos são: JPG e PNG.',
            'imagens.*.max' => 'Por favor, envie um arquivo menor que 2MB.',
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
