<?php

namespace Modules\CursoModulo\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Modules\CursoModulo\Repositories\CursoModuloRepository;

class CursoModuloService
{

  /**
   * @var CursoModuloRepository
   */
  private $repository;

  /**
   * Periodoervice constructor.
   * @param CursoModuloRepository $repository
   */
  public function __construct(CursoModuloRepository $repository)
  {
    $this->repository = $repository;
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
      ->orderBy('nome', 'ASC')
      ->get();
    return view('cursomodulo::index', ['cursos' => $cursos]);
  }

  public function create()
  {
    $cursos = DB::table('curso')
      ->orderBy('nome', 'ASC')
      ->get();
    return view('cursomodulo::create', ['cursos' => $cursos]);
  }

  public function edit($id)
  {
    $cursos = DB::table('curso')
      ->orderBy('nome', 'ASC')
      ->get();
    $cursomodulo = $this->repository->find($id);
    return view('cursomodulo::edit', ['cursomodulo' => $cursomodulo, 'cursos' => $cursos]);
  }

  public function destroy($id)
  {
    $obj = $this->repository->find($id);
    $obj->delete();
    return response()->json(['error' => 0, 'message' => 'O registro foi removido com sucesso.', 'data' => []], 200);
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
      $search['nome'] = filter_var($search['nome'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

      switch ((int)$order[0]['column']) {
        case 0:
          $sort = 'id';
          break;
        case 1:
          $sort = 'ordem';
          break;
        case 2:
          $sort = 'CURSO';
          break;
        case 3:
          $sort = 'titulo';
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
