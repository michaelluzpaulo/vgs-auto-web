<?php

namespace Modules\Site\Http\Controllers;


use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Site\Services\EmailService;
use Modules\Institucional\Repositories\InstitucionalRepository;
use Modules\Institucional\Repositories\InstitucionalFotoRepository;
use Modules\Categoria\Repositories\CategoriaRepository;
use Modules\Carro\Repositories\CarroFotoRepository;
use Modules\Carro\Repositories\CarroRepository;

class SiteController extends Controller
{
  private $institucionalRepository;
  private $institucionalFotoRepository;
  private $categoriaRepository;
  private $carroRepository;
  private $carroFotoRepository;
  private $emailService;

  public function __construct(CarroFotoRepository $carroFotoRepository, CategoriaRepository $categoriaRepository, CarroRepository $carroRepository, InstitucionalRepository $institucionalRepository, InstitucionalFotoRepository $institucionalFotoRepository, EmailService $emailService)
  {
    $this->emailService = $emailService;
    $this->institucionalRepository = $institucionalRepository;
    $this->institucionalFotoRepository = $institucionalFotoRepository;
    $this->categoriaRepository = $categoriaRepository;
    $this->carroRepository = $carroRepository;
    $this->carroFotoRepository = $carroFotoRepository;
  }

  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $bannersPrincipal = DB::table("banner")
      ->where("ativo", "=", "S")
      ->orderByRaw("ordem")
      ->get();

    // $bannersPrincipalMobile = DB::table("banner")
    //   ->where("ativo", "=", "S")
    //   ->orderByRaw("ordem")
    //   ->get();

    $carros = $this->carroRepository->listDestaque('N');
    // $carros = DB::table("carro")
    //   ->where("ativo", "=", "S")
    //   ->orderByRaw("ASC")
    //   ->limit(9)
    //   ->get();

    return view('site::index', ['pgId' => "pg-home", 'pgClass' => '', 'bannersPrincipal' => $bannersPrincipal, 'carros' => $carros]);
  }

  public function institucional($ref_amigavel)
  {
    $institucional = DB::table("institucional")->where("ref_amigavel", "=", $ref_amigavel)->first();
    $galeria = DB::table("institucional_foto")->where('institucional_id', '=', $institucional->id)->get();
    return view('site::institucional', ['pgId' => "pg-sobre", 'pgClass' => '', "institucional" => $institucional, "galeria" => $galeria]);
  }

  public function contato()
  {
    return view('site::contato', ['pgId' => "pg-contato", 'pgClass' => '',]);
  }

  public function artigos()
  {
    $artigos = DB::table("artigo")
      ->where("ativo", "=", "S")
      ->orderByRaw("data_cadastro DESC")
      ->get();


    return view('site::artigos', ['pgId' => "pg-artigos", 'pgClass' => '', "artigos" => $artigos]);
  }

  public function artigo($ref_amigavel)
  {
    $artigo = DB::table("artigo")
      ->where("ref_amigavel", "=", $ref_amigavel)
      ->first();


    return view('site::artigo', ['pgId' => "pg-artigos", 'pgClass' => '', "artigo" => $artigo]);
  }

  public function cursosOnline()
  {
    $cursos = DB::table("curso")
      ->where("ativo", "=", "S")
      ->orderByRaw("ordem")
      ->get();

    return view('site::cursos', ['pgId' => "pg-cursos", 'pgClass' => '', "cursos" => $cursos]);
  }

  public function terapias()
  {
    $terapias = DB::table("terapia")
      ->where("ativo", "=", "S")
      ->orderByRaw("ordem")
      ->get();

    return view('site::terapias', ['pgId' => "pg-terapias", 'pgClass' => '', "terapias" => $terapias]);
  }

  public function curso($ref_amigavel)
  {
    $curso = DB::table("curso")
      ->where("ref_amigavel", "=", $ref_amigavel)
      ->first();

    $galeria = DB::table("curso_foto")->where('curso_id', '=', $curso->id)->get();

    return view('site::curso', ['pgId' => "pg-cursos", 'pgClass' => '', "curso" => $curso, "galeria" => $galeria]);
  }

  public function terapia($ref_amigavel)
  {
    $terapia = DB::table("terapia")
      ->where("ref_amigavel", "=", $ref_amigavel)
      ->first();

    return view('site::terapia', ['pgId' => "pg-terapias", 'pgClass' => '', "terapia" => $terapia]);
  }

  public function sendContato(Request $request)
  {
    try {
      $data = json_decode($request->all()['data'], true);

      if (!filter_var(strtolower($data['email']), FILTER_VALIDATE_EMAIL)) {
        throw new Exception("E-mail inválido! ");
      }
      if (mb_strlen($data['nome']) < 6) {
        throw new Exception('Digite seu nome completo! ');
      }
      $this->emailService->contatoEmail($data);

      return response()->json(['error' => 0, 'message' => __('Mensagem enviada com sucesso'), 'data' => ''], 200);
    } catch (\Exception $e) {
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }
}
