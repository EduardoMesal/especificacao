<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class PedidosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $pedidoId = $this->route('id');

        return [
            'nome' => [
                'required',
                'max:255',
                Rule::unique('pedidos', 'nome')->where('excluido', null)
                    ->ignore($pedidoId, 'id'),
            ],
            'cliente_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Preencha o campo n° pedido.',
            'nome.max' => 'O nome deve conter no máximo 255 caracteres.',
            'nome.unique' => 'Já existe um pedido com esse número.',
            'cliente_id.required' => 'Preencha o campo cliente.',
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
