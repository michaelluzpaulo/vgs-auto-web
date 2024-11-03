<?php

namespace Modules\Institucional\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Institucional\Services\InstitucionalService;
use Modules\Institucional\Services\InstitucionalFotoService;

class InstitucionalController extends Controller
{
  /**
   * @var InstitucionalService
   */
  private $service;
  private $fotoService;

  /**
   * PeriodoController constructor.
   * @param InstitucionalService $service
   */
  public function __construct(InstitucionalService $service, InstitucionalFotoService $fotoService)
  {
    $this->service = $service;
    $this->fotoService = $fotoService;
  }

  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    return view('institucional::index');
  }

  /**
   * Update resource in storage.
   * @param InstitucionalRequest $request
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
   * @param InstitucionalRequest $request
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
    return view('institucional::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @return Response
   */
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
  public function updateGalleryFoto(Request $request, $id)
  {
    return $this->fotoService->saveGalleryFoto($id, $request);
  }
  public function destroyGalleryFoto($id, $fotoId)
  {
    return $this->fotoService->destroyGalleryFoto($id, $fotoId);
  }
}
