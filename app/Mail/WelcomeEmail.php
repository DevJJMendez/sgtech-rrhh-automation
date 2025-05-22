<?php

namespace App\Mail;

use App\Models\InvitationLink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Termwind\Components\Dd;

class WelcomeEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $invitationLink;
    public function __construct($invitationLink)
    {
        $this->invitationLink = $invitationLink;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenido a SGTech',
        );
    }
    public function content(): Content
    {
        $roleView = match ($this->invitationLink) {
            '1' => 'emails.colaborador',
            '2' => 'emails.aprendiz',
            '3' => 'emails.freelancer',
            default => 'emails.default',
        };
        return new Content(
            view: $roleView,
            with: ['invitation' => $this->invitationLink]
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
