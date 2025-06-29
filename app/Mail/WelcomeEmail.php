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
    public $role_id;
    public $signedURL;
    public function __construct(InvitationLink $invitationLink, $signedURL)
    {
        $this->invitationLink = $invitationLink;
        $this->role_id = $invitationLink->fk_collaborator_role_id;
        $this->signedURL = $signedURL;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bienvenid@ a SGTech',
        );
    }
    public function content(): Content
    {
        $roleView = match ($this->role_id) {
            '1' => 'emails.colaborador',
            '2' => 'emails.aprendiz',
            '3' => 'emails.freelancer',
            default => 'emails.default',
        };
        return new Content(
            view: $roleView,
            with: [
                'url' => $this->signedURL
            ]
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
