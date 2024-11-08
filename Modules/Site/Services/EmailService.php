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

  public static function financiamentoEmail($data)
  {
    if (env('APP_ENV') == 'production') {
      Mail::to(env("MAIL_TO_ADDRESS"), env("MAIL_TO_NAME"))
        ->cc('jossana.paulo@gmail.com.com', env("MAIL_TO_NAME"))
        ->send(new ContatoEmail($data));
    } else {
      Mail::to('michaelluzpaulo@gmail.com', env("MAIL_TO_NAME"))->send(new ContatoEmail($data));
    }
  }
}
