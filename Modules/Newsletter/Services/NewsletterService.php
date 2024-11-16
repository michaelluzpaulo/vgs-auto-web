<?php

namespace Modules\Newsletter\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\Newsletter\Repositories\NewsletterRepository;

class NewsletterService
{

  /**
   * @var NewsletterRepository
   */
  private $repository;

  /**
   * Periodoervice constructor.
   * @param NewsletterRepository $repository
   */
  public function __construct(NewsletterRepository $repository)
  {
    $this->repository = $repository;
  }

  public function isValidate($arr)
  {

    return $v = Validator::make($arr, [
      'nome' => 'required|min:2|max:70',
      'email' => 'required|min:2|max:150',
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

  public function create()
  {
    return view('newsletter::create', []);
  }

  public function edit($id)
  {
    $newsletter = $this->repository->find($id);
    return view('newsletter::edit', ['newsletter' => $newsletter]);
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
      $search['status'] = filter_var($search['status'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

      switch ((int)$order[0]['column']) {
        case 0:
          $sort = 'id';
          break;
        case 1:
          $sort = 'nome';
          break;
        case 2:
          $sort = 'email';
          break;
        case 3:
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
