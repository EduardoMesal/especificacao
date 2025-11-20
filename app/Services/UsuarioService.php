<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UsuarioService
{

    public function index(): Collection
    {
        $user = Auth::User();

        $usuarios = User::where('excluido', null)->where('id', '!=', $user->id)->get();

        return $usuarios;
    }

    public function criar(array $dados)
    {
        DB::beginTransaction();

        try {

            $createUser = new User();
            $createUser->nome = $dados['nome'];
            $createUser->email = $dados['email'];
            $createUser->tipo = $dados['tipo'];
            $createUser->criado = date('Y-m-d H:i:s');

            if ($dados['password'] && $dados['password_confirmation']) {
                if ($dados['password'] == $dados['password_confirmation']) {
                    $newPassword = Hash::make($dados['password']);
                    $createUser->password = $newPassword;
                }
            }
            
            if (isset($dados['avatar']) && $dados['avatar'] && $dados['avatar']->isValid()) {

                $avatar = $dados['avatar'];
                $extension = $dados['avatar']->extension();

                $dest = public_path('assets/img/users');
                $photoName = md5(time() . rand(0, 9999)) . '.' . $extension;

                $img = Image::make($avatar->getRealPath());
                $img->fit(360, 360)->save($dest . '/' . $photoName);
                $createUser->avatar = $photoName;
            } else {
                $createUser->avatar = 'avatar.png';
            }

            $response = $createUser->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_editar(int | string $id)
    {
        $usuario = User::where('id', $id)->where('excluido', null)->first();

        return $usuario;
    }

    public function editar(array $dados, int $usuarioId)
    {
        DB::beginTransaction();

        try {

            $user = User::find($usuarioId);

            if (!$user) {
                throw new \Exception('Nenhum usuário foi encontrado.', 404);
            }

            if ($dados['nome']) {
                $user->nome = $dados['nome'];
            }
    
            if ($dados['email'] && $dados['email'] !== $user->email) {
                $user->email = $dados['email'];
            }
    
            if ($dados['tipo']) {
                $user->tipo = $dados['tipo'];
            }
    
            if ($dados['password'] && $dados['password_confirmation']) {
                if ($dados['password'] == $dados['password_confirmation']) {
                    $newPassword = Hash::make($dados['password']);
                    $user->password = $newPassword;
                }
            }

            if (isset($dados['avatar']) && $dados['avatar'] && $dados['avatar']->isValid()) {
                $avatar = $dados['avatar'];
                $extension = $dados['avatar']->extension();

                if ($user->avatar !== 'avatar.png') {
                    File::delete(public_path("/assets/img/users/" . $user->avatar));
                }
                $dest = public_path('assets/img/users');
                $photoName = md5(time() . rand(0, 9999)) . '.' . $extension;
    
                $img = Image::make($avatar->getRealPath());
                $img->fit(360, 360)->save($dest . '/' . $photoName);
    
                $user->avatar = $photoName;
            } 
            
            $response = $user->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function get_perfil()
    {
        $user = Auth::User();
        $usuario = User::where('id', $user->id)->where('excluido', null)->first();
        return $usuario;
    }

    public function perfil(array $dados)
    {
        DB::beginTransaction();

        try {
            $loggedUser = Auth::User();

            $user = User::find($loggedUser->id);

            if (!$user) {
                return redirect('/dashboard')->with([
                    'error' => 'Nenhum usuário foi encontrado.'
                ]);
            }

            if ($dados['nome']) {
                $user->nome = $dados['nome'];
            }
    
    
            if ($dados['password'] && $dados['password_confirmation']) {
                if ($dados['password'] == $dados['password_confirmation']) {
                    $newPassword = Hash::make($dados['password']);
                    $user->password = $newPassword;
                }
            }

            if (isset($dados['avatar']) && $dados['avatar'] && $dados['avatar']->isValid()) {
                $avatar = $dados['avatar'];
                $extension = $dados['avatar']->extension();

                if ($user->avatar !== 'avatar.png') {
                    File::delete(public_path("/assets/img/users/" . $user->avatar));
                }
                $dest = public_path('assets/img/users');
                $photoName = md5(time() . rand(0, 9999)) . '.' . $extension;
    
                $img = Image::make($avatar->getRealPath());
                $img->fit(360, 360)->save($dest . '/' . $photoName);
    
                $user->avatar = $photoName;
            }
            
            $response = $user->save();

            if (!$response) {
                throw new \Exception('Erro ao salvar os dados.');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
