<?php

namespace App\Mail;

use App\Proyecto;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProyectosAprovados extends Mailable
{
    use Queueable, SerializesModels;

    public $proyecto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Proyecto $proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pmodular@cucei.udg.mx')->view('emails.proyectos-aprovados');
    }
}
