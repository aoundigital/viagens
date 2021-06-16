<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioLink extends Mailable
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
        return $this->subject('Ventura Holding | Pesquisa')->view('emails.link_aval');
    }
}
