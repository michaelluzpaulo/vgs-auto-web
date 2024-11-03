<?php

namespace Modules\CursoAula\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Modules\CursoAula\Repositories\CursoAulaRepository;
use Modules\CursoModulo\Repositories\CursoModuloRepository;
use Modules\CursoAula\Repositories\CursoAulaTirarDuvidaRepository;

class CursoAulaService
{

  /**
   * @var CursoAulaRepository
   */
  private $repository;
  private $cursoModuloRepository;
  private $cursoAulaTirarDuvidaRepository;

  /**
   * Periodoervice constructor.
   * @param CursoAulaRepository $repository
   */
  public function __construct(CursoAulaRepository $repository, CursoModuloRepository $cursoModuloRepository, CursoAulaTirarDuvidaRepository $cursoAulaTirarDuvidaRepository)
  {
    $this->repository = $repository;
    $this->cursoModuloRepository = $cursoModuloRepository;
    $this->cursoAulaTirarDuvidaRepository = $cursoAulaTirarDuvidaRepository;
  }

  public function isValidate($arr)
  {

    return $v = Validator::make($arr, [
      'titulo' => 'required|min:2|max:70',
    ]);
  }


  public function save($id = 0, $data)
  {

    $v = $this->isValidate($data);
    if ($v->fails()) {
      return __format_error_html($v);
    }

    if ($id) {
      $obj = $this->repository->find($id);
    } else {
      $obj = $this->repository;
    }

    $obj->fill($data);
    $obj->save();


    return response()->json(['error' => 0, 'message' => 'O registro foi salvo com sucesso.', 'data' => ['id' => $obj->id]], 200);
  }

  public function index()
  {
    $cursos = DB::table('curso')
      ->where('tipo', '=', '1')
      ->orderBy('nome', 'ASC')
      ->get();

    $cursosmodulos = DB::table('curso_modulo')
      ->orderBy('titulo', 'ASC')
      ->get();
    return view('cursoaula::index', ['cursos' => $cursos, 'cursosmodulos' => $cursosmodulos]);
  }

  public function create()
  {
    $cursos = DB::table('curso')
      ->orderBy('nome', 'ASC')
      ->get();


    return view('cursoaula::create', ['cursos' => $cursos]);
  }

  public function edit($id)
  {
    $cursoAula = $this->repository->find($id);
    $cursoModulo = $this->cursoModuloRepository->find($cursoAula->curso_modulo_id);

    $cursos = DB::table('curso')
      ->orderBy('nome', 'ASC')
      ->get();

    $cursosModulos = DB::table('curso_modulo')
      ->where('curso_id', '=', $cursoModulo->curso_id)
      ->orderBy('titulo', 'ASC')
      ->get();


    return view('cursoaula::edit', ['cursoAula' => $cursoAula, 'cursoModulo' => $cursoModulo, 'cursos' => $cursos, 'cursosModulos' => $cursosModulos]);
  }

  public function destroy($id)
  {
    $obj = $this->repository->find($id);
    $obj->delete();
    return response()->json(['error' => 0, 'message' => 'O registro foi removido com sucesso.', 'data' => []], 200);
  }

  public function listCursoModulos($id)
  {
    $modulos = DB::table('curso_modulo')
      ->where('curso_id', '=', $id)
      ->orderBy('titulo', 'ASC')
      ->get();

    return response()->json(['error' => 0, 'message' => 'Ok', 'modulos' => $modulos], 200);
  }

  public function createDuvidas($data, $aulaId)
  {
    $tirarDuvida = $this->cursoAulaTirarDuvidaRepository;
    $tirarDuvida->curso_aula_id = $aulaId;
    $tirarDuvida->aluno_id = __alunoAuth()->id;
    $tirarDuvida->users_id = 1;
    $tirarDuvida->acao = null;
    $tirarDuvida->texto = $data["texto"];
    $tirarDuvida->created_at = date("Y-m-d H:i:s");
    $tirarDuvida->save();

    return response()->json(['error' => 0, 'message' => 'O registro foi salvo com sucesso.', 'data' => ['aulaId' => $aulaId]], 200);
  }


  /**
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function findAll(Request $request)
  {
    try {

      $order = $request->get('order');
      $search = $request->get('search');

      $search['id'] = (int)$search['id'];
      $search['curso_id'] = (int)$search['curso_id'];
      $search['curso_modulo_id'] = (int)$search['curso_modulo_id'];
      $search['nome'] = filter_var($search['nome'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

      switch ((int)$order[0]['column']) {
        case 0:
          $sort = 'id';
          break;
        case 1:
          $sort = 'ordem';
          break;
        case 2:
          $sort = 'titulo';
          break;
        case 3:
          $sort = 'MODULO';
          break;
        case 4:
          $sort = 'CURSO';
          break;
      }

      $start = (int)$request->get('start');
      $limit = (int)$request->get('length');

      $query_params = [
        'start' => $start,
        'limit' => $limit,
        'sort' => $sort,
        'dir' => $order[0]['dir'],
        'search' => $search,
      ];

      $result = $this->repository->findAll($query_params);

      $draw = (int)$request->get('draw');

      $draw++;

      $response = [
        'success' => true,
        'draw' => $draw,
        'recordsTotal' => $result['recordsTotal'],
        'recordsFiltered' => $result['recordsFiltered'],
        'data' => $result['data']
      ];
    } catch (\Exception $e) {

      $response = [
        'message' => $e->getMessage()
      ];
    } finally {

      return response()->json($response, 200);
    }
  }
}
