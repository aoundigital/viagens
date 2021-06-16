<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioAvaliacao extends Mailable
{
    use Queueable, SerializesModels;

    public $conteudo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($conteudo)
    {
        $this->conteudo = $conteudo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ( $this->conteudo['tipo'] == 1 ) {
            return $this->subject('Chegada de Avaliação')->view('emails.avaliacao_casa');
        }
        return $this->subject('Chegada de Avaliação')->view('emails.avaliacao_barco');
    }
}
