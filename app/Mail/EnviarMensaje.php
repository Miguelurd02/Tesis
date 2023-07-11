<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnviarMensaje extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre;
    public $apellido;
    public $correo;
    public $telefono;
    public $propiedadId;
    public $mensaje;
    public $imagen;
    public $propiedad_nombre;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $apellido, $correo, $telefono, $propiedadId, $imagen, $propiedad_nombre, $mensaje)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->propiedadId = $propiedadId;
        $this->mensaje = $mensaje;
        $this->imagen = $imagen;
        $this->propiedad_nombre = $propiedad_nombre;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'PROPIEDAD ID#' . $this->propiedadId . ': Alguien está interesado en su propiedad',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'content.emails.mensaje',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
