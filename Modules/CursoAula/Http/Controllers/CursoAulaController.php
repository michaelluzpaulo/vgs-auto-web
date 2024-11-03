<?php

namespace Modules\CursoAula\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CursoAula\Services\CursoAulaService;

class CursoAulaController extends Controller
{
  /**
   * @var CursoAulaService
   */
  private $service;

  /**
   * PeriodoController constructor.
   * @param CursoAulaService $service
   */
  public function __construct(CursoAulaService $service)
  {
    $this->service = $service;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    return $this->service->index();
  }

  /**
   * Update resource in storage.
   * @param CursoAulaRequest $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function data(Request $request)
  {
    return $this->service->findAll($request);
  }

  /**
   * Show the form for creating a new resource.
   * @return Response
   */
  public function create()
  {
    return $this->service->create();
  }

  /**
   * Store a newly created resource in storage.
   * @param CursoAulaRequest $request
   */
  public function store(Request $request)
  {
    $data = json_decode($request->all()['data'], true);
    return $this->service->save(0, $data);
  }

  /**
   * Show the specified resource.
   * @return Response
   */
  public function show()
  {
    return view('cursoaula::show');
  }


  public function edit($id)
  {
    return $this->service->edit($id);
  }

  /**
   * Update the specified resource in storage.
   * @param  Request $request
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $data = json_decode($request->all()['data'], true);
    return $this->service->save($id, $data);
  }

  /**
   * Remove the specified resource from storage.
   * @return Response
   */
  public function destroy($id)
  {
    return $this->service->destroy($id);
  }


  public function listCursoModulos($id)
  {
    return $this->service->listCursoModulos($id);
  }

  public function createDuvidas(Request $request, $aulaId)
  {
    $data = json_decode($request->all()['data'], true);
    return $this->service->createDuvidas($data, $aulaId);
  }
}
