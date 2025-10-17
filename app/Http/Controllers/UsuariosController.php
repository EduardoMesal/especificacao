<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\PerfilRequest;
use App\Http\Requests\PasswordRequest;
use App\Services\UsuarioService;
use App\Services\DeleteDefaultService;
use App\Services\PasswordService;

class UsuariosController extends Controller
{
    public function index(Request $request, UsuarioService $usuarioService)
    {
        $usuarios = $usuarioService->index();

        return view('Usuarios/index', [
            'usuarios' => $usuarios,
        ]);
    }

    public function criar()
    {
        return view('Usuarios/criar', [
        ]);
    }

    public function criar_action(UsuarioRequest $request, UsuarioService $usuarioService)
    {
        try {
    
            $data = $request->only(['nome', 'email', 'tipo', 'password', 'password_confirmation', 'avatar']);

            $usuarioService->criar($data);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
         
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function editar($id, UsuarioService $usuarioService)
    {
       $usuario = $usuarioService->get_editar($id);

       if (!$usuario) {
            return redirect('/dashboard')->with([
               'error' => 'Nenhum usuário foi encontrado.'
            ]);
        }

        return view('Usuarios/editar', [
            'usuario' => $usuario,
        ]);
    }

    public function editar_action(UsuarioRequest $request, $id, UsuarioService $usuarioService)
    {
        try {
    
            $data = $request->only(['nome', 'email', 'tipo', 'password', 'password_confirmation', 'avatar', 'avatar_remove']);

            $usuarioService->editar($data, $id);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
         
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => $e->getCode() === 404
                    ? $e->getMessage()
                    : 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function excluir($id, DeleteDefaultService $deleteDefaultService)
    {
        if (!$id) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'message' => 'ID não fornecido',
            ], 400);
        }

        try {
           
            $deleteDefaultService->remove(new User(), 'id', null, $id, null);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Excluído com sucesso',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }
    }

    public function forgotPassword()
    {
        $checkTokens = PasswordReset::all();
        $horaAtual = Carbon::now();

        foreach ($checkTokens as $item) {
            $created_at = new Carbon($item->created_at);
            if ($horaAtual->greaterThan($created_at->addHour())) {
                PasswordReset::where('email', $item->email)->delete();
            }
        }

        return view('recuperar-senha');
    }

    //enviar para o email o link
    public function forgotPasswordAction(PasswordRequest $request, PasswordService $passwordService)
    {
        $resultado = $passwordService->solicitarResetSenha($request->email);

        return match ($resultado) {
            'invalid' => back()->with('error', 'Esse e-mail é inválido para recuperar a senha.')->withInput(),
            'ja_solicitado' => back()->with('error', 'Esse e-mail já possui uma solicitação ativa. Verifique sua caixa de entrada.')->withInput(),
            'sucesso' => back()->with('success', 'Email foi enviado com sucesso.'),
            default => back()->with('error', 'Ocorreu um erro inesperado.')->withInput(),
        };
    }

    public function showResetForm(Request $request, $token = null, PasswordService $passwordService)
    {
        $email = $request->email;
        $token = $request->token;

        $tokenValido = $passwordService->validarTokenReset($email, $token);

        if (!$tokenValido) {
            return redirect()->route('forgotPassword')->with('error', 'Token foi expirado, tente novamente');
        }

        return view('resetar-senha', [
            'token' => $token,
            'email' => $email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
    }

    public function resetPassword(PasswordRequest $request, PasswordService $passwordService)
    {
        $resultado = $passwordService->redefinirSenha($request->email, $request->token, $request->password);

        return match ($resultado) {
            'token_expirado' => redirect()->route('forgotPassword')->with('error', 'Token foi expirado, tente novamente.'),
            'usuario_nao_encontrado' => back()->with('error', 'Usuário não encontrado.')->withInput(),
            'sucesso' => redirect()->route('login')->with('success', 'Sua nova senha foi criada com sucesso!'),
            default => back()->with('error', 'Erro inesperado.')->withInput(),
        };
    }

    public function perfil(UsuarioService $usuarioService)
    {
       $usuario = $usuarioService->get_perfil();

       if (!$usuario) {
            return redirect('/dashboard')->with([
               'error' => 'Nenhum usuário foi encontrado.'
            ]);
        }

        return view('Usuarios/perfil', [
            'usuario' => $usuario
        ]);
    }

    public function perfil_action(PerfilRequest $request, UsuarioService $usuarioService)
    {
        try {

            $data = $request->only(['nome', 'password', 'password_confirmation', 'avatar', 'avatar_remove']);

            $usuarioService->perfil($data);

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Cadastro feito com sucesso',
            ], 201);
        } catch (\Exception $e) {
        
            return response()->json([
                'success' => false,
                'title' => 'Oops...',
                'icon' => 'error',
                'erro' => $e->getMessage(),
                'message' => 'Ocorreu um erro durante o processamento. Tente novamente.',
            ], 500);
        }

        return redirect('/dashboard')->with([
            'error' => 'Nenhum usuário foi encontrado.'
        ]);
    }
}
