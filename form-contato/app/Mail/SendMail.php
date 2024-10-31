<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $name, private $email, private $titulo, private $assunto)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $mailTo = env('MAIL_TO_ADDRESS') ?? 'acrossicauda@hotmail.com.br';
        $mailTitle = env('MAIL_FROM_NAME') ?? 'E-mail de Contato';
        return new Envelope(
            from: new Address($mailTo, $mailTitle),
            subject: $mailTitle . " - " . $this->titulo,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
//            view: 'mail.teste', // Email teste
            view: 'mail.contato',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'titulo' => $this->titulo,
                'assunto' => $this->assunto
            ],
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
}
