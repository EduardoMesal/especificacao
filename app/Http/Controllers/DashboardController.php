<?php

namespace App\Http\Controllers;

use App\Models\Especificacao;
use App\Models\Maquina;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function index(Request $request, DashboardService $dashboardService)
    {
        $dados = [
            'nome' => $request->input('nome'),
            'codigo_focco' => $request->input('codigo_focco'),
            'serie' => $request->input('serie'),
            'maquina_id' => $request->input('maquina_id'),
            'cliente_nome' => $request->input('cliente_nome'),

        ];

        $query = $dashboardService->index($dados);

        return view('Dashboard/index', [
            'especificacoes' => $query['especificacoes'],
            'especificacoesPerMonths' => $query['especificacoesPerMonths'],
            'maquinas' => $query['maquinas'],
            'codigo_focco' => $dados['codigo_focco'] ?? '',
            'serie' => $dados['serie'] ?? '',
            'maquina_id' => $dados['maquina_id'] ?? '',
            'cliente_nome' => $dados['cliente_nome'] ?? '',
            'especificacoesCount' => $query['especificacoesCount'] ?? 0,
            'masquinasCount' => $query['masquinasCount'] ?? 0,
            'pedidosCount' => $query['pedidosCount'] ?? 0,
        ]);
    }

    public function uploadImage(Request $request){
        $file = $request->file('file');

        if (!$file->isValid()) {
            return response()->json(['error' => 'Arquivo inválido'], 400);
        }

        $extension = $file->getClientOriginalExtension();
        $fileName = $file->getClientOriginalName();

        $destImg = public_path('assets/files');

        $i = 1;
        $baseFileName = pathinfo($fileName, PATHINFO_FILENAME);
        while (file_exists($destImg . '/' . $fileName)) {
            $fileName = $baseFileName . '_' . $i . '.' . $extension;
            $i++;
        }

        $file->move($destImg, $fileName);

        return response()->json([
            'location' => asset('assets/files/' . $fileName),
        ]);
    }
}
