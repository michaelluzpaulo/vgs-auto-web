<?php

namespace Modules\Carro\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class CarroRepository extends AbstractRepository implements RepositoryInterface
{

  /**
   * @var string
   */
  protected $table = "carro";
  protected $fillable = ['titulo', 'texto', 'ref_amigavel', 'ativo', 'vendido', 'created_at', 'updated_at', 'categoria_id', 'valor', 'img', 'cor', 'ano', 'combustivel', 'motorizacao', 'cambio'];
  //protected $guarded = ['id'];
  public $timestamps = false;


  public function listCambio()
  {
    return [
      1 => ['id' => 1, 'nome' => 'Automático'],
      2 => ['id' => 2, 'nome' => 'Manual'],
    ];
  }

  public function getCambio($id)
  {
    return $this->listCambio()[$id];
  }

  public function listCombustivel()
  {
    return [
      1 => ['id' => 1, 'nome' => 'Etanol'],
      2 => ['id' => 2, 'nome' => 'Gazolina'],
      3 => ['id' => 3, 'nome' => 'Flex'],
      4 => ['id' => 4, 'nome' => 'Diesel'],
    ];
  }

  public function getCombustivel($id)
  {
    return $this->listCombustivel()[$id];
  }
  public function listDestaque($vendido = 'S')
  {
    $select = DB::table('carro AS C')
      ->selectRaw("C.*,CAT.nome AS CATEGORIA")
      ->join("categoria AS CAT", 'C.categoria_id', 'CAT.id')
      ->orderByRaw('CAT.nome ASC, C.titulo ASC')
      ->limit(8);
    $select->whereRaw("C.vendido = '{$vendido}' && C.ativo = 'S'");
    return $select->get();
  }
  public function listCarros($vendido = 'S')
  {
    $select = DB::table('carro AS C')
      ->selectRaw("C.*,CAT.nome AS CATEGORIA")
      ->join("categoria AS CAT", 'C.categoria_id', 'CAT.id')
      ->orderByRaw('CAT.nome ASC, C.titulo ASC');
    $select->whereRaw("C.vendido = '{$vendido}' && C.ativo = 'S'");
    return $select->get();
  }

  /**
   * @param array $query_params
   * @return array
   */
  public function findAll(array $query_params): array
  {
    $params = [];

    // Carrega os registro conforme filtros aplicados.
    $select = DB::table('carro AS C')
      ->selectRaw("C.*,CAT.nome AS CATEGORIA")
      ->join("categoria AS CAT", 'C.categoria_id', 'CAT.id');

    if ($query_params['search']['id'] > 0) {
      $select->where(['C.id' => (int)$query_params['search']['id']]);
    }

    if (!empty($query_params['search']['titulo'])) {
      $select->where('C.titulo', 'LIKE', "%{$query_params['search']['titulo']}%");
    }

    if (!empty($query_params['search']['status'])) {
      $select->where('C.ativo', 'LIKE', $query_params['search']['status']);
    }

    if (!empty($query_params['search']['vendido'])) {
      $select->where('C.vendido', 'LIKE', $query_params['search']['status']);
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
      $data[] = ['DT_RowId' => $row->id, $row->id, $row->titulo, $row->CATEGORIA, $row->valor, $row->vendido, $row->ativo];
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
