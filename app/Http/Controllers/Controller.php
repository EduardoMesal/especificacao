<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;

use App\Models\Historico;
use App\Models\Idioma;
use App\Models\Notificacao;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function createEspecificacaoHistorico($especificacaoId, $userId, $atributoId, $caracteristicaId)
    {
        $especificacaoHistorico = new Historico();
        $especificacaoHistorico->especificacao_id = $especificacaoId;
        $especificacaoHistorico->usuario_id = $userId;
        $especificacaoHistorico->atributo_id = $atributoId;
        $especificacaoHistorico->caracteristica_id = $caracteristicaId;
        $especificacaoHistorico->criado = date('Y-m-d H:i:s');
        $especificacaoHistorico->save();
    }

    protected function createNotificacao($leadId, $userId, $conteudo, $origem, $data_lancamento, $tipo)
    {
        $notificacao = new Notificacao();
        $notificacao->lead_id = $leadId;
        $notificacao->usuario_id = $userId;
        $notificacao->conteudo = $conteudo;
        $notificacao->origem = $origem;
        $notificacao->data_lancamento = $data_lancamento;
        $notificacao->tipo = $tipo;
        $notificacao->criado = date('Y-m-d H:i:s');
        $notificacao->save();
    }

    public function __construct()
    {
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('Controller@', $controllerAction);

        if ($controller == 'Sites') {
            $notifyCookie = null;
            $rejectCookie = null;

            if (isset(request()->all()['headers']['X-Notify-Cookies']) || request()->header('x-notify-cookies')) {
                $notifyCookie = isset(request()->all()['headers']['X-Notify-Cookies']) ? request()->all()['headers']['X-Notify-Cookies'] : request()->header('x-notify-cookies');
            }
            if (isset(request()->all()['headers']['X-Reject-Cookies']) || request()->header('x-reject-cookies')) {
                $rejectCookie = isset(request()->all()['headers']['X-Reject-Cookies']) ? request()->all()['headers']['X-Reject-Cookies'] : request()->header('x-reject-cookies');
            }

            View::share([
                'notifyCookie' => $notifyCookie,
                'rejectCookie' => $rejectCookie,
                'controller' => $controller,
                'action' => $action
            ]);
        }

        $oldNotifications = Notificacao::where('visualizada', '1')->where('clicado', '<', Carbon::now()->subDays(2))->get();

        foreach ($oldNotifications as $item) {
            $item->delete();
        }

        view()->composer('*', function ($view) {
            $dateNow = Carbon::now();
            $loggedUser = Auth::user();
            $notifications = [];
            $notificationsCount = 0;

            if ($loggedUser && $loggedUser->tipo != 'cliente') {
                $notifications = Notificacao::where('usuario_id', $loggedUser->id)
                    ->where('data_lancamento', '<=', $dateNow)
                    ->orderBy('data_lancamento', 'DESC')
                    ->orderBy('id', 'DESC')
                    ->limit(25)
                    ->get();

                $notificationsCount = Notificacao::where('visualizada', '0')
                    ->where('usuario_id', $loggedUser->id)
                    ->where('data_lancamento', '<=', $dateNow)
                    ->count();
            }

             $idiomas = Idioma::query()
            ->orderBy('padrao', 'DESC')
            ->orderBy('id', 'DESC')
            ->where('excluido', null)
            ->get();

            $idiomaSet = request('lang') ? request('lang') : 'pt';
            
            $idioma = Idioma::where('codigo', $idiomaSet)->first();

            $view->with([
                'loggedUser' => $loggedUser,
                'notifications' => $notifications,
                'notificationsCount' => $notificationsCount,
                'dateNow' => $dateNow,
                'idiomas' => $idiomas,
                'idioma' => $idioma,
            ]);
        });
    }
}
