<?php

namespace Modules\Curso\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class CursoFotoRepository extends AbstractRepository implements RepositoryInterface
{

  protected $table = "curso_foto";
  protected $fillable = ['legenda', 'img', 'curso_id', 'destaque', 'ordem'];
  //protected $guarded = ['id'];
  public $timestamps = false;



  public function findAll(array $query_params): array
  {
    $params = [];
    return [];

    // // Carrega os registro conforme filtros aplicados.
    // $select = DB::table('entidade_produto AS EP')
    //   ->selectRaw("EP.*,medida.simbolo AS MEDIDA_SIMBOLO,moeda.simbolo AS MOEDA_SIMBOLO,moeda.sigla,PC.nome AS PRODUTO,DATE_FORMAT(EP.created_at,'%d/%m/%Y') AS DATE_CREATE")
    //   ->join('produto AS P', 'EP.produto_id', '=', 'P.id')
    //   ->join('produto_comp AS PC', 'P.id', '=', 'PC.produto_id')
    //   ->join('entidade AS E', 'P.id', '=', 'PC.produto_id')
    //   ->leftjoin('medida', 'EP.medida_id', '=', 'medida.id')
    //   ->leftjoin('moeda', 'EP.moeda_id', '=', 'moeda.id')

    //   ->where('PC.sigla', '=', 'pt');

    // $select->groupBy('EP.id');
    // // $select->groupBy('PC.nome');
    // // ->where('EP.entidade_id', __cliente()['id']);


    // // if ($query_params['search']['id'] > 0) {
    // //   $select->where(['SA.id' => (int)$query_params['search']['id']]);
    // // }

    // // if (!empty($query_params['search']['titulo'])) {
    // //   $select->where('SA.titulo', 'LIKE', "%{$query_params['search']['titulo']}%");
    // // }
    // // if (!empty($query_params['search']['status'])) {
    // //   $select->where('SA.status', 'LIKE', $query_params['search']['status']);
    // // }

    // // Execute for get the total records filtered
    // $result = $select->get();

    // $recordsFiltered = $result->count();

    // if ($query_params['limit'] >= 0) {
    //   $select->offset($query_params['start'])->limit($query_params['limit']);
    // }

    // // set order by
    // $select->orderBy($query_params['sort'], $query_params['dir']);

    // // Execute for get the result data
    // $result = $select->get();

    // $data = [];

    // foreach ($result as $row) {
    //   $data[] = [
    //     'DT_RowId' => $row->id, $row->id,
    //     $row->DATE_CREATE,
    //     str_pad($row->numero_controle, 4, '0', STR_PAD_LEFT),
    //     $row->PRODUTO,
    //     $row->quantidade . " " . $row->MEDIDA_SIMBOLO,
    //     "({$row->sigla}) {$row->MOEDA_SIMBOLO} {$row->preco_alvo}",
    //     $row->oferta,
    //     $this->getStatusByRef($row->status)['nome_pt']
    //   ];
    // }

    // // Set total amount of table
    // if (count($params)) {
    //   $recordsTotal = $this->count();
    // } else {
    //   $recordsTotal = $recordsFiltered;
    // }

    // return [
    //   'recordsFiltered' => $recordsFiltered,
    //   'recordsTotal' => $recordsTotal,
    //   'data' => $data
    // ];
  }
}
