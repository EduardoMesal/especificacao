<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacao;
Use Alert;
use App\Models\Campanha;
use App\Models\Marca;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class NotificacoesController extends Controller
{
    public function index(){
        $user = Auth::User();
        $notifications = null;

        $oldNotifications = Notificacao::where('visualizada', '1')->where('clicado', '<', Carbon::now()->subDays(2))->get();

        foreach ($oldNotifications as $item) {
            $item->delete();
        }

        $notifications = Notificacao::where('usuario_id', $user->id)->orderBy('id', 'DESC')->orderBy('criado', 'DESC')->paginate(25);

        return view('notificacao',[
            'nt' => $notifications,
        ] );
    }

    public function action(Request $request){
        $notifyId = $request->input('notificacoes');

        if($notifyId != null ){
            foreach($notifyId as $item){
                $visualizada = Notificacao::where('id', $item)->first();
                $visualizada->visualizada = '1';
                $visualizada->clicado = date('Y-m-d H:i:s');
                $visualizada->save();
            }

            return response()->json([
                'success' => true,
                'title' => 'Feito',
                'icon' => 'success',
                'message' => 'Atualizada com sucesso',
            ], 200);


        }else{

            return redirect('/notificacao')->with([
                'error' => 'Nenhuma notificação foi encontrada.'
            ]);

        }

    }

    public function actionSingle(Request $request, $marca = null, $slug, $id){
        $leadId = $request->input('leadId');
        if($leadId){
            $user = Auth::User();
            $marca = Marca::where('slug', $marca)->where('excluido', null)->first();
            if($marca){
                $site = $user->lojista_sites()->where('slug', $slug)->with('marca')->where('excluido', null)->whereHas('marca', function($query) use($marca) {
                    $query->where('slug', $marca->slug);
                })->first();
    
                if($site){
                    $visualizada = Notificacao::where('id', $id)->first();
                    $visualizada->visualizada = '1';
                    $visualizada->clicado = date('Y-m-d H:i:s');
                    $visualizada->save();
                    
                    return redirect()->route('Lead.lead', ['marca' => $marca->slug, 'slug' => $slug, 'id' => $leadId]);
        
                }
            }

            return redirect('/login')->with([
                'error' => 'Não foi possível acessar esta página.'
            ]);

        }else{
            return back()->with('error', 'Nenhuma notificação foi encontrada.' );
        }

    }


    public function readAll(){
        $user = Auth::User();

        if($user){

            Notificacao::where('usuario_id', $user->id)
            ->update([
                'visualizada' => '1',
                'clicado' => now(),
            ]);

            return back()->with('success', 'Notificações lidas com sucesso.' );

        }else{
            return back()->with('error', 'Nenhuma notificação foi encontrada.' );
        }

    }


}
