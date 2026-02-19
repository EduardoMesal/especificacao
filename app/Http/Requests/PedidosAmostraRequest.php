<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PedidosAmostraRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'imagens.*' => 'file|mimes:jpeg,png,jpg,pdf,doc,docx|max:3072',
            'pedido_id' => 'required|exists:pedidos,id',
        ];
    }

    public function messages()
    {
        return [
            'imagens.*.file' => 'O arquivo enviado é inválido.',
            'imagens.*.mimes' => 'O arquivo deve ser uma imagem (jpg, png, jpeg), PDF ou Word (doc, docx).',
            'imagens.*.max' => 'O arquivo não pode exceder 3MB.',
            'pedido_id.required' => 'O campo pedido é obrigatório.',
            'pedido_id.exists' => 'O pedido selecionado é inválido.',
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