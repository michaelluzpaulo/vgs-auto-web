<?php

namespace Modules\Site\Services;

use App\Mail\ContatoEmail;
use App\Mail\CursoCadastroEmail;
use App\Mail\CursoCadastroSimplificadoEmail;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class EmailService
{

  /**
   * Pacoteervice constructor.
   * @param PacoteRepository $repository
   */
  public function __construct() {}

  //  public static function novaSenhaEmail($data)
  //  {
  //     if (env('APP_ENV') == 'production') {
  //        Mail::to($data['email'], $data['nome'])->send(new NovaSenhaEmail($data));
  //     } else {
  //        Mail::to('michaelluzpaulo@gmail.com', env("MAIL_TO_NAME"))->send(new NovaSenhaEmail($data));
  //     }
  //  }

  public static function contatoEmail($data)
  {
    if (env('APP_ENV') == 'production') {
      Mail::to(env("MAIL_TO_ADDRESS"), env("MAIL_TO_NAME"))
        ->cc('cursoseterapiasintegradas@gmail.com', env("MAIL_TO_NAME"))
        ->send(new ContatoEmail($data));
    } else {
      Mail::to('michaelluzpaulo@gmail.com', env("MAIL_TO_NAME"))->send(new ContatoEmail($data));
    }
  }

  public static function cursoCadastroSimplificadoEmail($data)
  {
    if (env('APP_ENV') == 'production') {
      Mail::to($data["email"], $data["nome"])
        // ->cc('cursoseterapiasintegradas@gmail.com', env("MAIL_TO_NAME"))
        ->send(new CursoCadastroSimplificadoEmail($data));
    } else {
      Mail::to('michaelluzpaulo@gmail.com', env("MAIL_TO_NAME"))->send(new CursoCadastroSimplificadoEmail($data));
    }
  }

  public static function cursoCadastroEmail($data)
  {
    if (env('APP_ENV') == 'production') {
      Mail::to($data["email"], $data["nome"])
        // ->cc('cursoseterapiasintegradas@gmail.com', env("MAIL_TO_NAME"))
        ->send(new CursoCadastroEmail($data));
    } else {
      Mail::to('michaelluzpaulo@gmail.com', env("MAIL_TO_NAME"))->send(new CursoCadastroEmail($data));
    }
  }
}
