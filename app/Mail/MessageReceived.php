<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Contraseña de usuario APPDenuncias';
    public $contrasena;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contrasena) {
        //Muestra el contenido del nuevo usuario que se ha creado, en el correo. La variable viene del controller
        $this->contrasena = $contrasena;
    }

    /**
     * Build the message.
     *
     * @return $this
     *
     * Se crea una vista que será lo que se muestre en el correo electrónico
     */
    public function build()
    {
        return $this->view('emails.message-received');
    }
}
