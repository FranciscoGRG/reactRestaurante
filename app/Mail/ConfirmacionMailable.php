<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacionMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $email; 
    public $fecha; 
    public $mensaje;

    /**
     * Create a new message instance.
     */
    public function __construct($nombre, $email, $fecha, $mensaje) //Inicializo variables
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->fecha = $fecha;
        $this->mensaje = $mensaje;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmacion Reserva',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content( //Crea el email con el contenido de la vista que paso
            view: 'confirmacion_reserva',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->view('confirmacion_reserva'); //Construye el mensaje con la vista
    }
}
