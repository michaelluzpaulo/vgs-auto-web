<?php

namespace Modules\Site\Http\Controllers;


use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Curso\Repositories\CursoRepository;
use Modules\Site\Services\EmailService;
use Modules\Institucional\Repositories\InstitucionalRepository;
use Modules\Aluno\Repositories\AlunoRepository;
use Modules\Aluno\Repositories\AlunoCursoRepository;

class SiteController extends Controller
{
  public $alunoRepository;
  public $alunoCursoRepository;
  public $cursoRepository;
  public $institucionalRepository;
  private $emailService;

  public function __construct(CursoRepository $cursoRepository,  AlunoRepository $alunoRepository, AlunoCursoRepository $alunoCursoRepository, InstitucionalRepository $institucionalRepository, EmailService $emailService)
  {
    $this->emailService = $emailService;
    $this->cursoRepository = $cursoRepository;
    $this->institucionalRepository = $institucionalRepository;
    $this->alunoRepository = $alunoRepository;
    $this->alunoCursoRepository = $alunoCursoRepository;
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

    $bannersPrincipalMobile = DB::table("banner")
      ->where("ativo", "=", "S")
      ->orderByRaw("ordem")
      ->get();


    $institucional = $this->institucionalRepository->find(1);
    $institucionalFoto =  $this->institucionalRepository->getFirstImg(1);

    $depoimentos = DB::table("depoimento")
      ->where("ativo", "=", "S")
      ->orderByRaw("RAND()")
      ->get();

    $cursos = DB::table("curso")
      ->where("ativo", "=", "S")
      ->orderByRaw("ordem")
      ->limit(9)
      ->get();

    $terapias = DB::table("terapia")
      ->where("ativo", "=", "S")
      ->orderByRaw("ordem")
      ->limit(9)
      ->get();

    return view('site::index', ['pgId' => "pg-home", 'pgClass' => '', 'bannersPrincipal' => $bannersPrincipal, "institucional" => $institucional, "institucionalFoto" => $institucionalFoto, "depoimentos" => $depoimentos, "cursos" => $cursos, "terapias" => $terapias, "bannersPrincipalMobile " => $bannersPrincipalMobile]);
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
