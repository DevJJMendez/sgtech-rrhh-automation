<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendWelcomeEmailRequest;
use App\Mail\WelcomeEmail;
use App\Models\CollaboratorRole;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class SendWelcomeEmailController extends Controller
{
    public function index()
    {
        $collaboratorRoles = CollaboratorRole::select(['collaborator_role_id', 'name'])->get();
        return view('emails.form', compact('collaboratorRoles'));
    }
    public function sendWelcomeEmail(SendWelcomeEmailRequest $sendWelcomeEmailRequest)
    {
        $uuid = Str::uuid()->toString();
        $email = $sendWelcomeEmailRequest->email;
        $role = $sendWelcomeEmailRequest->role;
        $expiresAt = now()->addDays(2);

        try {
            $invitationLink = InvitationLink::create([
                'uuid' => $uuid,
                'email' => $email,
                'fk_collaborator_role_id' => $role,
                'expires_at' => $expiresAt
            ]);
            $signedURL = URL::temporarySignedRoute(
                'hiring.form',
                now()->addDays(2),
                ['invitation' => $uuid]
            );
            $invitationLink->load('collaboratorRole');
            Mail::to($email)->queue(new WelcomeEmail($invitationLink, $signedURL));
            notify()->success('El correo fue enviado correctamente.', 'Éxito');
            if ($sendWelcomeEmailRequest->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Correo enviado correctamente'
                ]);
            }
            return redirect()->back();
        } catch (\Throwable $exception) {
            Log::error("Error al enviar correo de bienvenida: {$exception->getMessage()}");
            notify()->error("Ocurrió un error al enviar el correo. {$exception->getMessage()}", 'Error');
            if ($sendWelcomeEmailRequest->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error: ' . $exception->getMessage(),
                ], 500);
            }
        }
    }
}
