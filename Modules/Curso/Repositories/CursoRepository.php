<?php

namespace Modules\Curso\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class CursoRepository extends AbstractRepository implements RepositoryInterface
{

  /**
   * @var string
   */
  protected $table = "curso";
  protected $fillable = ['nome', 'texto', 'ativo', 'valor', 'tipo', 'ref_amigavel', 'data_inicial', 'img', 'ordem', 'data_final', 'duracao'];
  //protected $guarded = ['id'];
  public $timestamps = false;


  public function _listTipos(): array
  {
    return [
      1 => ['id' => 1, 'nome' => 'Ead a distancia'],
      2 => ['id' => 2, 'nome' => 'Presencial'],
      3 => ['id' => 3, 'nome' => 'Evento online'],
    ];
  }

  public function _getTipo($id = 1): array
  {
    return self::_listTipos()[$id];
  }


  /**
   * @param array $query_params
   * @return array
   */
  public function findAll(array $query_params): array
  {
    $params = [];

    // Carrega os registro conforme filtros aplicados.
    $select = DB::table('curso AS I')
      ->selectRaw("I.*");

    if ($query_params['search']['id'] > 0) {
      $select->where(['I.id' => (int)$query_params['search']['id']]);
    }

    if (!empty($query_params['search']['nome'])) {
      $select->where('I.nome', 'LIKE', "%{$query_params['search']['nome']}%");
    }
    if (!empty($query_params['search']['tipo'])) {
      $select->where('I.tipo', 'LIKE', "%{$query_params['search']['tipo']}%");
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
      $data[] = ['DT_RowId' => $row->id, $row->id, $row->nome, $row->ordem, $row->ativo];
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
