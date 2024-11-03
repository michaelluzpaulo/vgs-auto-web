<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CursoCadastroSimplificadoEmail extends Mailable
{
  use Queueable, SerializesModels;
  public $arr;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($arr)
  {
    $this->arr = $arr;

    return $this->from('auth@cursoseterapiasintegradas.com.br', 'Cursos e Terapias Integradas')
      ->subject('Novo Cadastro de Aluno')
      ->replyTo('contato@cursoseterapiasintegradas.com.br', 'Cadastro de Aluno');
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('site::emails/cursoCadastroSimplificado', ['data' => $this->arr]);
  }
}
