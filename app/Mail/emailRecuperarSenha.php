<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emailRecuperarSenha extends Mailable
{
    use Queueable, SerializesModels;

    protected $nova_senha;

    public function __construct($nova_senha)
    {
        $this->nova_senha = $nova_senha;

    }

    public function build()
    {
        $dados = ['nova_senha', $this->$nova_senha];
        return $this->view('mails.emailRecuperarSenha', compact('dados'));
    }
}
