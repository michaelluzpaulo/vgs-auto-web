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
  protected $fillable = ['titulo', 'texto', 'ref_amigavel', 'ativo', 'status', 'created_at', 'updated_at', 'categoria_id', 'valor', 'img', 'cor', 'ano', 'combustivel', 'motorizacao', 'cambio', 'km'];
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

  public function listCombustivel(): array
  {
    return [
      1 => ['id' => 1, 'nome' => 'Etanol'],
      2 => ['id' => 2, 'nome' => 'Gazolina'],
      3 => ['id' => 3, 'nome' => 'Flex'],
      4 => ['id' => 4, 'nome' => 'Diesel'],
    ];
  }

  public function getCombustivel(int $key)
  {
    return $this->listCombustivel()[$key];
  }

  public function listStatus(): array
  {
    return [
      "D" => ['id' => "D", 'nome' => 'Disponivel'],
      "V" => ['id' => "V", 'nome' => 'Vendido'],
      "R" => ['id' => "R", 'nome' => 'Reservado'],
    ];
  }

  public function _getStatus(string $key)
  {
    return $this->listStatus()[$key] ?? ['id' => "", 'nome' => 'Indefinido'];
  }

  // Vendido = Status
  // Sim --> Disponível
  // Não --> Vendido
  // R --> Reservado

  public function listDestaque(string $status = 'V')
  {
    $select = DB::table('carro AS C')
      ->selectRaw("C.*,CAT.nome AS CATEGORIA")
      ->join("categoria AS CAT", 'C.categoria_id', 'CAT.id')
      ->orderByRaw('CAT.nome ASC, C.titulo ASC')
      ->limit(8);
    $select->whereRaw("C.status = '{$status}' && C.ativo = 'S'");
    return $select->get();
  }
  public function listCarros($ativo = 'S')
  {
    $select = DB::table('carro AS C')
      ->selectRaw("C.*,CAT.nome AS CATEGORIA")
      ->join("categoria AS CAT", 'C.categoria_id', 'CAT.id')
      ->orderByRaw('CAT.nome ASC, C.titulo ASC');
    $select->whereRaw("C.ativo = '{$ativo}' && C.ativo = 'S'");
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

    if (!empty($query_params['search']['active'])) {
      $select->where('C.ativo', '=', $query_params['search']['active']);
    }

    if (!empty($query_params['search']['status'])) {
      $select->where('C.status', '=', $query_params['search']['status']);
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
      $data[] = ['DT_RowId' => $row->id, $row->id, $row->titulo, $row->CATEGORIA, $row->valor, $this->_getStatus($row->status)["nome"], $row->ativo];
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
