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
          'imagens.*' => 'image|mimes:jpeg,png,jpg|max:3072',
          'pedido_id' => 'required|exists:pedidos,id',
        ];
    }

    public function messages()
    {
        return [
            'imagens.*.image' => 'O arquivo enviado deve ser uma imagem.',
            'imagens.*.mimes' => 'A imagem deve estar no formato jpg, png ou jpeg.',
            'imagens.*.max' => 'A imagem não pode exceder 3MB.',
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