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
use Modules\Endereco\Repositories\CidadeRepository;
use Modules\Endereco\Repositories\EnderecoRepository;
use Modules\Endereco\Repositories\EstadoRepository;
use Modules\Cliente\Repositories\ClienteRepository;
use Modules\Transacao\Repositories\TransacaoRepository;
use Modules\Transacao\Repositories\TransacaoItemRepository;

class CheckoutController extends Controller
{
  public $transacaoRepository;
  public $transacaoItemRepository;
  public $clienteRepository;
  public $cidadeRepository;
  public $enderecoRepository;
  public $estadoRepository;
  public $alunoRepository;
  public $alunoCursoRepository;
  public $cursoRepository;
  public $institucionalRepository;
  private $emailService;

  public function __construct(ClienteRepository $clienteRepository, TransacaoRepository $transacaoRepository, TransacaoItemRepository $transacaoItemRepository, CursoRepository $cursoRepository, EstadoRepository $estadoRepository, CidadeRepository $cidadeRepository, EnderecoRepository $enderecoRepository, AlunoRepository $alunoRepository, AlunoCursoRepository $alunoCursoRepository, InstitucionalRepository $institucionalRepository, EmailService $emailService)
  {
    $this->emailService = $emailService;
    $this->cursoRepository = $cursoRepository;
    $this->institucionalRepository = $institucionalRepository;
    $this->alunoRepository = $alunoRepository;
    $this->alunoCursoRepository = $alunoCursoRepository;
    $this->cidadeRepository = $cidadeRepository;
    $this->enderecoRepository = $enderecoRepository;
    $this->estadoRepository = $estadoRepository;
    $this->clienteRepository = $clienteRepository;
    $this->transacaoRepository = $transacaoRepository;
    $this->transacaoItemRepository = $transacaoItemRepository;
  }


  public function cupom(Request $request)
  {
    try {
      $codigo = $request->cupom;
      $cupom = DB::table('cupom')->where('codigo', $codigo)->where('ativo', '=', 'S')->where('qtd', '>', 0)->first();
      if (!$cupom) {
        throw new Exception("Nenhum cupom disponível para este código! ");
      }
      session(['cupom' => $cupom]);
      return response()->json(['error' => 0, 'message' => 'Cupom aplicado com sucesso!', 'data' => $cupom], 200);
    } catch (\Exception $e) {
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }

  public function checkout(Request $request, $id)
  {

    $curso = $this->cursoRepository->find($id);

    // session()->flush();
    $view_endereco = ['uf' => 'SP', 'cidade_id' => 8452];
    $estados = $this->estadoRepository->listCombo();
    $cupom = '';
    $cliente = '';
    $endereco = '';
    if (session()->has('cupom')) {
      $cupom = session('cupom');
    }

    if (session()->has('cliente')) {
      $sessionCliente = session('cliente', null);
      $cliente = $this->clienteRepository->find($sessionCliente['id']);
      $endereco = $this->enderecoRepository->findOne(['cliente_id' => $sessionCliente['id']]);

      if ($endereco) {
        $cidade = $endereco ? $this->cidadeRepository->find($endereco->cidade_id) : null;
        $endereco->uf = $cidade ? $cidade->uf : null;
        $cidades = $cidade ? $this->cidadeRepository->list($cidade->uf) : null;
      }
    }

    if (!isset($cidades)) {
      $cidades = $this->cidadeRepository->list('SP');
    }
    $curso = $this->cursoRepository->find($curso->id);
    return view('site::checkout', ['pgId' => 'pg-checkout',  'pgClass' => 'checkout-page', 'cliente' => $cliente, 'endereco' => $endereco, 'cupom' => $cupom, 'objCurso' => $curso, 'qtd' => $request->qtd, 'view_endereco' => $view_endereco, 'cidades' => $cidades, 'estados' => $estados]);
  }

  public function transactionPagseguroNotify(Request $request, $transacao_id)
  {

    try {
      DB::beginTransaction();
      $transacao = $this->transacaoRepository->find($transacao_id);

      if (!$transacao) {
        throw new Exception("Transação não encontrada! ");
      }

      if (env("APP_ENV") == 'production') {
        $data = $request->all();
      } else {
        $tLog = DB::table('transacao_log')->where('transacao_id', "=", $transacao->id)->orderBy('id', 'desc')->first();
        $data = json_decode($tLog->log_json, true);
      }

      $transacao->status = $data['charges'][0]['status'];
      if (isset($data['charges'][0]['payment_method']['type'])) {
        $transacao->tipo_pagamento = $data['charges'][0]['payment_method']['type'];

        if (isset($data['charges'][0]['payment_method']['card']['brand'])) {
          $brand = $data['charges'][0]['payment_method']['card']['brand'];
          $nVezes = $transacao->tipo_pagamento = $data['charges'][0]['payment_method']['installments'];
          $transacao->tipo_pagamento .= " {$nVezes}x ({$brand})";
        }
      }

      $transacao->save();

      DB::insert("INSERT transacao_log (transacao_id, log_json, created_at) VALUES (?,?,?)", [
        $transacao->id,
        json_encode($data),
        date('Y-m-d H:i:s')
      ]);

      if ($transacao->status == 'PAID') {
        $alunoTemp = json_decode($transacao->aluno_json, true);
        $aluno = DB::table('aluno')->where('cpf', "=", $alunoTemp['cpf'])->first();
        if (!$aluno) {
          DB::table('aluno')->where('email', "=", $alunoTemp['email'])->first();
        }

        if (!$aluno) {
          $novasenha = __geraSenha(6, false, true, false);
          $aluno = $this->alunoRepository;
          $aluno->fill($alunoTemp);
          $aluno->ativo = "S";
          $aluno->receberNews = "S";
          $aluno->password = \Illuminate\Support\Facades\Hash::make($novasenha);
          $aluno->save();
        }

        $transacaoItem = DB::table('transacao_item')->where('transacao_id', "=", $transacao->id)->first();
        $alunoCurso = DB::table('aluno_curso')
          ->where('aluno_id', "=", $aluno->id)
          ->where('curso_id', "=", $transacaoItem->curso_id)
          ->where('transacao_id', "=", $transacao->id)
          ->first();

        if (!$alunoCurso) {
          $alunoCurso = $this->alunoCursoRepository;
          $alunoCurso->curso_id = $transacaoItem->curso_id;
          $alunoCurso->aluno_id = $aluno->id;
          $alunoCurso->transacao_id = $transacao->id;
          $alunoCurso->status = 1;
          $alunoCurso->free = 'N';
          $alunoCurso->save();
        }

        try {
          $curso = $this->cursoRepository->find($transacaoItem->curso_id);
          $dataEmail = [
            'email' => $aluno->email,
            'nome' => $aluno->nome,
            'password' => $novasenha,
            'CURSO' => $curso->nome,
            'cpf' => $curso->nome,
            'telefone' => $curso->nome,
          ];

          $this->emailService->cursoCadastroEmail($dataEmail);
        } catch (\Exception $e) {
          echo "Erro ao enviar e-mail de cadastro! " . $e->getMessage();
        }
      }
      DB::commit();

      return response()->json(['error' => 0, 'message' => "OK", 'transacaoID' => $transacao->id], 200);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }

  public function testeTransactionPagseguroNotify(Request $request, $transacao_id)
  {

    try {
      DB::beginTransaction();
      $transacao = $this->transacaoRepository->find($transacao_id);

      if (!$transacao) {
        throw new Exception("Transação não encontrada! ");
      }

      if ($transacao->status == 'PAID') {
        $alunoTemp = json_decode($transacao->aluno_json, true);
        $aluno = DB::table('aluno')->where('cpf', "=", $alunoTemp['cpf'])->first();
        if (!$aluno) {
          DB::table('aluno')->where('email', "=", $alunoTemp['email'])->first();
        }

        if (!$aluno) {
          $novasenha = __geraSenha(6, false, true, false);
          $aluno = $this->alunoRepository;
          $aluno->fill($alunoTemp);
          $aluno->ativo = "S";
          $aluno->receberNews = "S";
          $aluno->password = \Illuminate\Support\Facades\Hash::make($novasenha);
          $aluno->save();
        }

        $transacaoItem = DB::table('transacao_item')->where('transacao_id', "=", $transacao->id)->first();
        $alunoCurso = DB::table('aluno_curso')
          ->where('aluno_id', "=", $aluno->id)
          ->where('curso_id', "=", $transacaoItem->curso_id)
          ->where('transacao_id', "=", $transacao->id)
          ->first();

        if (!$alunoCurso) {
          $alunoCurso = $this->alunoCursoRepository;
          $alunoCurso->curso_id = $transacaoItem->curso_id;
          $alunoCurso->aluno_id = $aluno->id;
          $alunoCurso->transacao_id = $transacao->id;
          $alunoCurso->status = 1;
          $alunoCurso->free = 'N';
          $alunoCurso->save();
        }

        try {
          $curso = $this->cursoRepository->find($transacaoItem->curso_id);
          $dataEmail = [
            'email' => $aluno->email,
            'nome' => $aluno->nome,
            'password' => $novasenha ?? 'Já cadastrado',
            'CURSO' => $curso->nome,
            'cpf' => $curso->nome,
            'telefone' => $curso->nome,
          ];

          $this->emailService->cursoCadastroEmail($dataEmail);
        } catch (\Exception $e) {
          echo "Erro ao enviar e-mail de cadastro! " . $e->getMessage();
          // $message .= "<br><b>Atenção</b> aluno houve algum problema com o e-mail <b>{$aluno->email}</b> e sua senha não pode ser enviada, por favor entrar em contato conosco.";
        }
      }
      DB::commit();

      return response()->json(['error' => 0, 'message' => "OK", 'transacaoID' => $transacao->id], 200);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }

  public function checkoutTransaction(Request $request)
  {
    $data = json_decode($request->all()['data'], true);

    try {
      DB::beginTransaction();

      $curso = $this->cursoRepository->find($data["curso_id"]);

      $data['data_nascimento'] = $data['data_nascimento'] ? (__date_iso_to_mysql($data['data_nascimento'])) : '';

      $clienteBF = DB::table('cliente')->where('cpf', "=", $data['cpf'])->first();
      if (!$clienteBF) {
        $clienteBF = DB::table('cliente')->where('email', "=", $data['email'])->first();
      }

      if ($clienteBF) {
        $cliente = $this->clienteRepository->find($clienteBF->id);
        $endereco = $this->enderecoRepository->findOne(['cliente_id' => $cliente->id]);
      } else {
        $cliente = $this->clienteRepository;
        $endereco = $this->enderecoRepository;
      }
      $data['ativo'] = "S";
      $cliente->fill($data);
      $cliente->save();

      $data['cliente_id'] = $cliente->id;
      $endereco->fill($data);
      $endereco->save();


      $alunoBF = new \stdClass();
      $alunoBF->nome = $data['nome'];
      $alunoBF->email = $data['email'];
      $alunoBF->cpf = $data['cpf'];
      $alunoBF->telefone = $data['telefone'];

      $transacao = $this->transacaoRepository;
      $transacao->fill($data);
      $transacao->cliente_id = $cliente->id;
      if (session()->has('cupom')) {
        $cupom = session('cupom');
        $transacao->cupom_id = $cupom ? $cupom->id : null;
      }

      $transacao->tipo_pessoa = 'F';
      $transacao->documento = $cliente->cpf;
      $transacao->valor = $curso->valor;
      $transacao->valor_desconto = $transacao->cupom_id ? (($cupom->desconto / 100) *  $curso->valor) : 0;
      $transacao->desconto_percentual = $transacao->cupom_id ? $cupom->desconto : 0;
      $transacao->valor_total = $transacao->cupom_id ? ($curso->valor - $transacao->valor_desconto) :  $curso->valor;
      $transacao->tipo_pagamento = " - ";
      $transacao->status = 'Iniciado';
      $transacao->aluno_json = json_encode($alunoBF);
      $transacao->endereco_json = json_encode($endereco->toArray());
      $transacao->cliente_json = json_encode($cliente->toArray());
      $transacao->save();

      $transacaoItem = $this->transacaoItemRepository;
      $transacaoItem->nome = $curso->nome;
      $transacaoItem->qtd = 1;
      $transacaoItem->valor = $transacao->valor_total;
      $transacaoItem->curso_id = $curso->id;
      $transacaoItem->transacao_id = $transacao->id;
      $transacaoItem->save();

      $cidade = $this->cidadeRepository->find($endereco->cidade_id);
      $telBF = explode(" ", $cliente->telefone);
      $ddd = preg_replace("/[^0-9]/", "", $telBF[0]);
      $tel = preg_replace("/[^0-9]/", "", $telBF[1]);

      $data = [
        "reference_id" => $transacao->id,
        // "expiration_date" => "2024-08-15T14:00:00-03:00",
        "soft_descriptor" => "Cursos e Terapias",
        "redirect_url" => "https://cursoseterapiasintegradas.com.br",
        "return_url" => "https://cursoseterapiasintegradas.com.br",
        "notification_urls" => ["https://cursoseterapiasintegradas.com.br/transaction/notify/" . $transacao->id],
        "payment_notification_urls" => ["https://cursoseterapiasintegradas.com.br/transaction/notify/" . $transacao->id],
        "customer" => [
          "name" => $cliente->nome,
          "email" => $cliente->email,
          "tax_id" => preg_replace("/[^0-9]/", "", $cliente->cpf),
          "phone" => [
            "country" => "+55",
            'area' => $ddd,
            'number' => $tel
          ],
        ],
        "customer_modifiable" => true,
        "items" => [
          [
            "reference_id" => $transacaoItem->id,
            "name" => $transacaoItem->nome,
            "quantity" => $transacaoItem->qtd,
            "unit_amount" => (int) preg_replace("/[^0-9]/", "", $transacaoItem->valor),
          ],
        ],
        // "additional_amount" => 0,
        "discount_amount" => $transacao->valor_desconto > 0 ? preg_replace("/[^0-9]/", "", $transacao->valor_desconto) : 0,
        "discount_amount" => 0,
        "shipping" => [
          "type" => "FREE",
          "amount" => 0,
          "service_type" => "PAC",
          "address" => [
            "country" => "BRA",
            "region_code" => $endereco->uf,
            "city" => $cidade->nome,
            "postal_code" => preg_replace("/[^0-9]/", "", $endereco->cep),
            "street" => $endereco->logradouro,
            "number" => $endereco->numero,
            "locality" => $endereco->bairro,
            // "complement" => "-",
          ],
          "address_modifiable" => true,
          "box" => [
            "dimensions" => [
              "length" => 15,
              "width" => 10,
              "height" => 14,
            ],
            "weight" => 300,
          ],
        ],
        "payment_methods" => [
          ["type" => "CREDIT_CARD"],
          ["type" => "DEBIT_CARD"],
          ["type" => "BOLETO"],
          ["type" => "PIX"]
        ],
        "payment_methods_configs" => [
          [
            "type" => "CREDIT_CARD",
            "config_options" => [
              ["option" => "INSTALLMENTS_LIMIT", "value" => 6]
            ]
          ]
        ]
        // "payment_methods" => [
        //   [
        //     "type" => "credit_card",
        //     "brands" => ["mastercard"],
        //   ],
        //   [
        //     "type" => "credit_card",
        //     "brands" => ["visa"],
        //   ],
        //   [
        //     "type" => "credit_card",
        //     "brands" => ["elo"],
        //   ],
        //   [
        //     "type" => "debit_card",
        //     "brands" => ["visa"],
        //   ],
        //   [
        //     "type" => "PIX",
        //   ],
        //   [
        //     "type" => "BOLETO",
        //   ],
        // ],
        // "payment_methods_configs" => [
        //   [
        //     "type" => "credit_card",
        //     // "brands" => ["mastercard"],
        //     "config_options" => [
        //       [
        //         "option" => "installments_limit",
        //         "value" => "6",
        //       ],
        //     ],
        //   ],
        // ],
      ];

      $production = env("APP_ENV") == 'production' ? true : false;
      $urlRequest = $production ? 'https://api.pagseguro.com' : 'https://sandbox.api.pagseguro.com';

      if ($production) {
        $token = '3810ed13-3dbc-454c-b53e-d24356d35f445e6d42b54af8bae51b2153e7d5e2d29b0fd8-b712-46fd-a0d1-6f5fc322cf54';
      } else {
        $token = '8e6e59cf-7dfc-4863-9fc9-34fec443a83ccf5db5bd4e49a83bc055f6665bb1d68082a1-1de0-49c7-a93d-6a3853551731';
      }

      $client = new \GuzzleHttp\Client();
      $res = $client->request('POST', "{$urlRequest}/checkouts", [
        'headers' => [
          'Authorization' => 'Bearer ' . $token,
          'Content-Type' => 'application/json',
          'Accept' => 'application/json',
        ],
        'body' => json_encode($data)
      ]);

      $respPagseguro = json_decode($res->getBody(), true);

      if (!isset($respPagseguro['status']) || $respPagseguro['status'] != 'ACTIVE') {
        throw new Exception("Erro ao gerar transação com o PagSeguro! ");
      }

      $transacao->pagseguro_ref_ck = $respPagseguro['id'];
      $transacao->status = "Iniciado";
      $transacao->save();
      $linkPagamento = $respPagseguro['links'][1]['href'];

      DB::commit();
      return response()->json(['error' => 0, 'message' => 'OK', 'data' => ['id' => $transacao->id, 'link_pagamento' => $linkPagamento]], 200);
    } catch (\Exception $e) {
      DB::rollback();
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }

  public function sendCursoCadastroSimplificado(Request $request)
  {
    try {
      $data = json_decode($request->all()['data'], true);

      if (!filter_var(strtolower($data['email']), FILTER_VALIDATE_EMAIL)) {
        throw new Exception("E-mail inválido! ");
      }
      if (mb_strlen($data['nome']) < 6) {
        throw new Exception('Digite seu nome completo! ');
      }
      DB::beginTransaction();
      $alunoBF = DB::table("aluno")->where('cpf', "=", $data['cpf'])->first();

      if (!$alunoBF) {
        $aluno = $this->alunoRepository;
        $aluno->email = $data['email'];
        $aluno->cpf = $data['cpf'];
        $aluno->nome = $data['nome'];
        $aluno->telefone = $data['telefone'];
        $aluno->receberNews = isset($data['receberNews']) ? "S" : "N";
        $aluno->ativo = "S";
        $data['password'] = __geraSenha(6, false, true, false);
        $aluno->password = \Illuminate\Support\Facades\Hash::make($data['password']);
        $aluno->save();
      } else {
        $aluno = $this->alunoRepository->find($alunoBF->id);
        $aluno->telefone = $data['telefone'];
        $aluno->receberNews = isset($data['receberNews']) ? "S" : "N";
        $aluno->ativo = "S";
        $aluno->save();
      }

      $alunoCursoBF = DB::table("aluno_curso")->where('aluno_id', "=", $aluno->id)->where('curso_id', "=", $data['curso_id'])->first();

      if ($alunoCursoBF) {
        throw new Exception("Você já esta inscrito nesse curso, para mais explicações entre em contato! ");
      }
      $alunoCurso = $this->alunoCursoRepository;
      $alunoCurso->curso_id = $data['curso_id'];
      $alunoCurso->aluno_id =  $aluno->id;
      $alunoCurso->free = 'S';
      $alunoCurso->status = 1;
      $alunoCurso->save();

      DB::commit();

      $message = "Sua inscrição foi realizada com sucesso! ";
      if (!$alunoBF) {
        $message .= "<br>Em breve você estará recebendo um e-mail com sua senha para acesso a área do aluno.";


        try {
          $curso = $this->cursoRepository->find($data['curso_id']);
          $data['CURSO'] = $curso->nome;
          $this->emailService->cursoCadastroSimplificadoEmail($data);
        } catch (\Exception $e) {
          $message .= "<br><b>Atenção</b> aluno houve algum problema com o e-mail <b>{$aluno->email}</b> e sua senha não pode ser enviada, por favor entrar em contato conosco.";
        }
      }

      return response()->json(['error' => 0, 'message' => $message, 'data' => ''], 200);
    } catch (\Exception $e) {
      DB::rollBack();
      return response()->json(['error' => 1, 'message' => $e->getMessage(), 'data' => ''], 400);
    }
  }

  public function isValidateClienteForenkey($arr, $id, $tab, $senha = true)
  {
    $arrParams = [
      'email' => "required|unique:{$tab},email,{$id},id",
      'cpf' => "required|min:14|unique:{$tab},cpf,{$id},id",
    ];

    if ($senha || (isset($arrParams['senha']) && $arrParams['senha'])) {
      $arrParams['senha'] = 'required|min:6|max:12';
    }

    return Validator::make($arr, $arrParams);
  }
}
