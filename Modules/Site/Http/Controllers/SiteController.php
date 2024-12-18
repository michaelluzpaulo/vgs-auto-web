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
use Modules\Newsletter\Repositories\NewsletterRepository;

class SiteController extends Controller
{
  private $institucionalRepository;
  private $institucionalFotoRepository;
  private $categoriaRepository;
  private $carroRepository;
  private $carroFotoRepository;
  private $emailService;
  private $newsletterRepository;

  public function __construct(CarroFotoRepository $carroFotoRepository, CategoriaRepository $categoriaRepository, CarroRepository $carroRepository, InstitucionalRepository $institucionalRepository, InstitucionalFotoRepository $institucionalFotoRepository, EmailService $emailService, NewsletterRepository $newsletterRepository)
  {
    $this->emailService = $emailService;
    $this->institucionalRepository = $institucionalRepository;
    $this->institucionalFotoRepository = $institucionalFotoRepository;
    $this->categoriaRepository = $categoriaRepository;
    $this->carroRepository = $carroRepository;
    $this->carroFotoRepository = $carroFotoRepository;
    $this->newsletterRepository = $newsletterRepository;
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

    $carro = $this->carroRepository->listDestaque('D');


    return view('site::index', ['pgId' => "pg-home", 'pgClass' => '', 'bannersPrincipal' => $bannersPrincipal, 'carro' => $carro]);
  }

  public function institucional($ref_amigavel)
  {
    $institucional = DB::table("institucional")->where("ref_amigavel", "=", $ref_amigavel)->first();
    $galeria = DB::table("institucional_foto")->where('institucional_id', '=', $institucional->id)->get();
    return view('site::institucional', ['pgId' => "pg-sobre", 'pgClass' => '', "institucional" => $institucional, "galeria" => $galeria]);
  }

  public function nossoEndereco(Request $request)
  {
    $institucional = $this->institucionalRepository->find(2);
    return view('site::localizacao', [
      'pgId' => "pg-localizacao",
      'pgClass' => '',
      "institucional" => $institucional
    ]);
  }


  public function contato()
  {
    return view('site::contato', ['pgId' => "pg-contato", 'pgClass' => '',]);
  }

  public function vendidos(Request $request)
  {
    $carros = $this->carroRepository->listDestaque('S');
    return view('site::vendidos', ['pg_id' => 'pg-vendidos', 'pg_class' => '', 'carros' => $carros]);
  }

  public function carros()
  {
    $carro = $this->carroRepository->listCarros();

    return view('site::carros', ['pgId' => "pg-carros", 'pgClass' => '', 'carro' => $carro]);
  }

  public function carro($ref_amigavel)
  {
    $carro = $this->carroRepository->findOne(['ref_amigavel' => $ref_amigavel]);
    $carroFotos = $this->carroFotoRepository->findByArray(['carro_id' => $carro->id], ['*'], 'ordem ASC');
    $categoria = $this->categoriaRepository->find($carro['categoria_id']);


    return view('site::carro', ['pgId' => "pg-carro", 'pgClass' => '', "carro" => $carro, 'categoria' => $categoria, 'carroFotos' => $carroFotos]);
  }

  public function financiamento(Request $request)
  {
    $institucional = $this->institucionalRepository->find(2);
    return view('site::financiamento', ['pgId' => 'pg-financiamento', 'pgClass' => '', "institucional" => $institucional]);
  }


  public function financiamentoSend(Request $request)
  {
    try {
      $data = json_decode($request->all()['data'], true);

      if (!filter_var(strtolower($data['email']), FILTER_VALIDATE_EMAIL)) {
        throw new Exception("E-mail inválido! ");
      }
      if (mb_strlen($data['nome']) < 6) {
        throw new Exception('Digite seu nome completo! ');
      }

      $data['parcelasTxt'] = "";
      if (isset($data['parcelas']) && count($data['parcelas']) > 0) {
        $data['parcelasTxt'] = implode(', ', $data['parcelas']);
      }
      $data['desejo_receber_promocao_ofertasTxt'] = isset($data['desejo_receber_promocao_ofertas']) ? 'SIM' : 'NÃO';

      if (isset($data['desejo_receber_promocao_ofertas'])) {
        $existNews = DB::table('newsletter')->where('email', '=', $data['email'])->first();
        $newsletter =  $existNews ? $this->newsletterRepository->find($existNews->id) : $this->newsletterRepository;
        $newsletter->fill($data);
        $newsletter->save();
      }

      $this->emailService->financiamentoEmail($data);

      return response()->json(['error' => 0, 'message' => __('Mensagem enviada com sucesso'), 'data' => ''], 200);
    } catch (\Exception $e) {
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }
}
