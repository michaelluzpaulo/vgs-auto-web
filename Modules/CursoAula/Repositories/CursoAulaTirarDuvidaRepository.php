<?php

namespace Modules\CursoAula\Repositories;

use Illuminate\Support\Facades\DB;
use Modules\Admin\Repositories\AbstractRepository;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Class PeriodoRepository
 * @package Modules\Cadastro\Repositories
 */
class CursoAulaTirarDuvidaRepository extends AbstractRepository implements RepositoryInterface
{

  /**
   * @var string
   */
  protected $table = "curso_aula_duvida";
  protected $fillable = ['curso_aula_id', 'aluno_id', 'users_id', 'acao', 'assunto', 'created_at'];
  //protected $guarded = ['id'];
  public $timestamps = false;


  /**
   * @param array $query_params
   * @return array
   */
  public function findAll(array $query_params): array
  {
    $params = [];


    return [];
  }
}
