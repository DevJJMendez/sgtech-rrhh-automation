<?php

namespace App\Mail;

use App\Models\InvitationLink;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
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
        return [
            Attachment::fromPath(storage_path('app/public/InternalRegulations/PERMISOS-LICENCIAS-E-INCAPACIDADES.pdf'))
                ->as('Politica de permisos, licencias e incapacidades.pdf')
                ->withMime('application/pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/POLÍTICA-DE-DESCONEXIÓN-LABORAL.pdf'))
                ->as('Politica de desconexión laboral.pdf')
                ->withMime('application/pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/POLÍTICA-DE-PREVENCIÓN-DE-CONSUMO-DE-TABACO-ALCOHOL-Y-DROGAS.pdf'))
                ->as('Politica de prevención de consumo de tabaco, alcohol y drogas.pdf')
                ->withMime('application/pdf.pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/POLÍTICA-DE-SEGURIDAD-Y-SALUD-EN-EL-TRABAJO.pdf'))
                ->as('Politica de prevención de seguridad y salud en el trabajo.pdf')
                ->withMime('application/pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/POLÍTICA-DE-TRABAJO-EN-CASA-TELETRABAJO-Y-TRABAJO-REMOTO.pdf'))
                ->as('Politica de trabajo en casa, teletrabajo y trabajo remoto.pdf')
                ->withMime('application/pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/POLÍTICA-DE-TRATAMIENTO-DE-DATOS-PERSONALES-SERVIGUIDE-BPO.pdf'))
                ->as('Politica de tratamiento de datos personales.pdf')
                ->withMime('application/pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/REGLAMENTO-DE-HIGIENE-INDUSTRIAL.pdf'))
                ->as('Reglamento de higiene industrial.pdf')
                ->withMime('application/pdf'),

            Attachment::fromPath(storage_path('app/public/InternalRegulations/SERVIGUIDE-BPO-INFORMACIÓN-EMPRESARIAL.pdf'))
                ->as('Informacion Empresarial.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
