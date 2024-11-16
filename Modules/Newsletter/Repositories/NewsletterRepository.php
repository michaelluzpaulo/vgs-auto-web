<?php

namespace Modules\Newsletter\Repositories;

use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class NewsletterRepository extends AbstractRepository implements RepositoryInterface
{

  /**
   * @var string
   */
  protected $table = "newsletter";
  protected $fillable = ['nome', 'email', 'telefone', 'ativo'];
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
    $select = \DB::table('newsletter AS N')
      ->selectRaw("N.*");

    if ($query_params['search']['id'] > 0) {
      $select->where(['N.id' => (int)$query_params['search']['id']]);
    }

    if (!empty($query_params['search']['nome'])) {
      $select->where('N.nome', 'LIKE', "%{$query_params['search']['nome']}%");
    }
    if (!empty($query_params['search']['status'])) {
      $select->where('N.ativo', 'LIKE', $query_params['search']['status']);
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
      $data[] = ['DT_RowId' => $row->id, $row->id, $row->nome, $row->email,  $row->ativo];
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
