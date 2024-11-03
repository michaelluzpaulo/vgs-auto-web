<?php

namespace Modules\Institucional\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class InstitucionalRepository extends AbstractRepository implements RepositoryInterface
{

  /**
   * @var string
   */
  protected $table = "institucional";
  protected $fillable = ['titulo', 'texto', 'ref_amigavel'];
  //protected $guarded = ['id'];
  public $timestamps = false;


  public function getFirstImg(int $id)
  {
    $institucionalFoto = DB::table("institucional_foto")
      ->where('institucional_id', '=', $id)
      ->limit(1)
      ->get();

    return  $institucionalFoto[0];
  }

  public function getListImg(int $id)
  {
    return DB::table("institucional_foto")
      ->where('institucional_id', '=', $id)
      ->get();
  }
  /**
   * @param array $query_params
   * @return array
   */
  public function findAll(array $query_params): array
  {
    $params = [];

    // Carrega os registro conforme filtros aplicados.
    $select = DB::table('institucional AS I')
      ->selectRaw("I.*");

    if ($query_params['search']['id'] > 0) {
      $select->where(['I.id' => (int)$query_params['search']['id']]);
    }

    if (!empty($query_params['search']['titulo'])) {
      $select->where('I.titulo', 'LIKE', "%{$query_params['search']['titulo']}%");
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
      $data[] = ['DT_RowId' => $row->id, $row->id, $row->titulo, $row->ref_amigavel];
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
