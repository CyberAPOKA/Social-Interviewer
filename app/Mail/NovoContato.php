<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovoContato extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome, $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('christian_andre98@hotmail.com')
                    ->subject('EMAIL TESTE')
                    ->view('index');
    }
}
