<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function registerUser()
{
  $user = Auth::user();

  if (!$user) {
    Auth::logout();
    session()->flush();
    return redirect('/login');
  }

  $userExtra = new stdClass();
  // attach role name to object user
  $userExtra->role_name = $user->role->name;

  // register user object in the session
  session(['user' => $user, 'userExtra' => $userExtra]);
}

function user()
{
  $userBF = session('user', null);

  if (!$userBF) {
    registerUser();
  }
  return session('user', null);
}

function userExtra()
{
  return session('userExtra', null);
}

function __alunoAuth()
{
  return session('@CTI_AREA_RESTRITA:aluno', null);
}

function __alunoAuthLogoff()
{
  session()->forget('@CTI_AREA_RESTRITA:aluno');
  header("Location: /area-restrita-aluno/login");
  exit();
}

function __logoImg()
{
  return user()->avatar ?: base_path('public/img/logo.png');
}

function avatar()
{
  $image = user()->avatar ?: base_path('public/img/avatar.png');

  $data = base64_encode(file_get_contents($image));

  $src = "data:image/png;base64,{$data}";

  return $src;
}

function __logo()
{
  $image = __logoImg();

  $data = base64_encode(file_get_contents($image));

  $src = "data:image/png;base64,{$data}";

  return $src;
}

function __logoMini()
{
  $image = user()->avatar ?: base_path('public/img/logo_pq.png');

  $data = base64_encode(file_get_contents($image));

  $src = "data:image/png;base64,{$data}";

  return $src;
}

function customer()
{
  if (!session()->get('customer')) {
    $n = new stdClass();
    $n->nome_fantasia = env('APP_TITLE');
    session(['customer' => $n]);
  }
  return session()->get('customer');
}


function __geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false)
{
  $lmin = 'abcdefghijklmnopqrstuvwxyz';
  $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $num = '1234567890';
  $simb = '!@#$%*-';
  $retorno = '';
  $caracteres = '';

  $caracteres .= $lmin;
  if ($maiusculas) $caracteres .= $lmai;
  if ($numeros) $caracteres .= $num;
  if ($simbolos) $caracteres .= $simb;

  $len = strlen($caracteres);
  for ($n = 1; $n <= $tamanho; $n++) {
    $rand = mt_rand(1, $len);
    $retorno .= $caracteres[$rand - 1];
  }
  return $retorno;
}
