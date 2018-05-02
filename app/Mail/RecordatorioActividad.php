<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecordatorioActividad extends Mailable
{
    use Queueable, SerializesModels;

    public $inscripcion;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inscripcion)
    {
        $this->inscripcion = $inscripcion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recordatorioActividad');
    }
}