<?php

namespace Modules\CursoAula\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class CursoAulaRepository extends AbstractRepository implements RepositoryInterface
{

  /**
   * @var string
   */
  protected $table = "curso_aula";
  protected $fillable = ['curso_modulo_id', 'titulo', 'texto', 'video', 'duracao', 'ordem'];
  //protected $guarded = ['id'];
  public $timestamps = false;


  /**
   * @param array $query_params
   * @return array
   */
  public function findAll(array $query_params): array
  {
    $params = [];

    // Carrega os registro conforme filtros aplicados.
    $select = DB::table('curso_aula AS CA')
      ->selectRaw("CA.*,C.nome AS CURSO,CM.titulo AS MODULO")
      ->join('curso_modulo AS CM', 'CM.id', '=', 'CA.curso_modulo_id')
      ->join('curso AS C', 'C.id', '=', 'CM.curso_id');


    if ($query_params['search']['id'] > 0) {
      $select->where(['CA.id' => (int)$query_params['search']['id']]);
    }

    if (!empty($query_params['search']['nome'])) {
      $select->where('CA.nome', 'LIKE', "%{$query_params['search']['nome']}%");
    }

    if ($query_params['search']['curso_id'] > 0) {
      $select->where(['C.id' => (int)$query_params['search']['curso_id']]);
    }

    if ($query_params['search']['curso_modulo_id'] > 0) {
      $select->where(['CM.id' => (int)$query_params['search']['curso_modulo_id']]);
    }


    // Execute for get the total records filtered
    $result = $select->get();

    $recordsFiltered = $result->count();

    if ($query_params['limit'] >= 0) {
      $select->offset($query_params['start'])->limit($query_params['limit']);
    }

    // set order by
    $select->orderBy($query_params['sort'], $query_params['dir']);

    // Execute for get the result data
    $result = $select->get();

    $data = [];

    foreach ($result as $row) {
      $data[] = ['DT_RowId' => $row->id, $row->id, $row->ordem, $row->titulo, $row->MODULO, $row->CURSO];
    }

    // Set total amount of table
    if (count($params)) {
      $recordsTotal = $this->count();
    } else {
      $recordsTotal = $recordsFiltered;
    }

    return [
      'recordsFiltered' => $recordsFiltered,
      'recordsTotal' => $recordsTotal,
      'data' => $data
    ];
  }
}
