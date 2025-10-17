<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DeleteDefaultService
{
    public function remove(Model $model = null, $type = 'id', Model $relacionamentoModel = null, int $modelId, string $foreignKey = null): bool
    {
        DB::beginTransaction();

        try {
            
            $agora = now();
            $registro = null;

            if($model){
                $registro = $model->where($type, $modelId)->first();

                if (!$registro) {
                    throw new \Exception('Registro principal não encontrado.', 404);
                }

                if ($registro && array_key_exists('excluido', $registro->getAttributes())) {
                    $registro->excluido = $agora;
                    $registro->save();
                } else {
                    $registro->delete();
                }

            }

            if($relacionamentoModel){
                $relacionamentoModel->where($foreignKey, $registro->id)
                ->update(['excluido' => $agora]);
            }
           
            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
