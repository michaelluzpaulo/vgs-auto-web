<?php

namespace Modules\Carro\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Modules\Carro\Repositories\CarroRepository;
use Modules\Categoria\Repositories\CategoriaRepository;
use Modules\Carro\Repositories\CarroFotoRepository;

class CarroService
{

  /**
   * @var CarroRepository
   */
  private $repository;
  private $carroFotoRepository;
  private $categoriaRepository;

  /**
   * Periodoervice constructor.
   * @param CarroRepository $repository
   */
  public function __construct(CarroRepository $repository, CategoriaRepository $categoriaRepository, CarroFotoRepository $carroFotoRepository)
  {
    $this->repository = $repository;
    $this->categoriaRepository = $categoriaRepository;
    $this->carroFotoRepository = $carroFotoRepository;
  }

  public function isValidate($arr)
  {

    return $v = Validator::make($arr, [
      'titulo' => 'required|min:2|max:100',
      'texto' => 'required',
    ]);
  }


  public function save($id = 0, $data)
  {


    $v = $this->isValidate($data);
    if ($v->fails()) {
      return __format_error_html($v);
    }

    $data['valor'] = __currency_iso_to_mysql($data['valor']);

    if ($id) {
      $obj = $this->repository->find($id);
    } else {
      $obj = $this->repository;
    }

    $obj->fill($data);
    $obj->save();

    $obj->autoSaveRefAmigavel($obj->titulo);
    // CarroFotoService::__saveGallery($data);


    return response()->json(['error' => 0, 'message' => 'O registro foi salvo com sucesso.', 'data' => ['id' => $obj->id]], 200);
  }

  public function create()
  {
    $categorias = $this->categoriaRepository->findByArray([], ['*'], 'nome ASC');
    $combustiveis = $this->repository->listCombustivel();
    $cambios = $this->repository->listCambio();
    return view('carro::create', ['categorias' => $categorias, 'combustiveis' => $combustiveis, 'cambios' => $cambios]);
  }

  public function edit($id)
  {
    $categorias = $this->categoriaRepository->findByArray([], ['*'], 'nome ASC');
    $carro = $this->repository->find($id);
    $carroFotos = $this->carroFotoRepository->findByArray(['carro_id' => $id], ['*'], 'ordem');

    $combustiveis = $this->repository->listCombustivel();
    $cambios = $this->repository->listCambio();


    return view('carro::edit', ['carro' => $carro,  'categorias' => $categorias, 'combustiveis' => $combustiveis, 'cambios' => $cambios,  'carroFotos' => $carroFotos]);
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
      $search['nome'] = filter_var($search['nome'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

      switch ((int)$order[0]['column']) {
        case 0:
          $sort = 'id';
          break;
        case 1:
          $sort = 'titulo';
          break;
        case 2:
          $sort = 'CATEGORIA';
          break;
        case 3:
          $sort = 'valor';
          break;
        case 4:
          $sort = 'vendido';
          break;
        case 5:
          $sort = 'ativo';
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
