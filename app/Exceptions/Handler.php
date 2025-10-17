<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $e)
    {

        // Validação de formulário
        if ($e instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'message' => 'Erro de validação.',
                'errors'  => $e->errors(),
            ], 422);
        }

        // Modelo não encontrado
        if ($e instanceof ModelNotFoundException) {
            return response()->json([
                'success' => false,
                'message' => 'Recurso não encontrado.'
            ], 404);
        }

        // Erros HTTP genéricos (como HttpException(403, 'Proibido'))
        if ($e instanceof HttpException) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage() ?: 'Erro HTTP.'
            ], $e->getStatusCode());
        }

        // Erro no banco de dados
        if ($e instanceof QueryException) {
            return response()->json([
                'success' => false,
                'message' => 'Erro no banco de dados.',
                'error' => $e->getMessage(),
            ], 500);
        }

        // Outros erros genéricos
        return response()->json([
            'success' => false,
            'message' => 'Erro inesperado ao processar a solicitação. Tente novamente mais tarde.',
            'error' => $e->getMessage(),
            'e' => $request
        ], 500);
    }
}
