<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendWelcomeEmailRequest;
use App\Mail\WelcomeEmail;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SendWelcomeEmailController extends Controller
{
    public function sendWelcomeEmail(SendWelcomeEmailRequest $sendWelcomeEmailRequest)
    {
        $uuid = Str::uuid()->toString();
        $email = $sendWelcomeEmailRequest->email;
        $role = $sendWelcomeEmailRequest->role;
        // $expiresAt = now()->addDays(3);

        try {
            $invitationLink = InvitationLink::create([
                'uuid' => $uuid,
                'email' => $email,
                'role' => $role
                // 'expires_at' => $expiresAt
            ]);
            $userRole = $invitationLink->role;
            Mail::to($email)->queue(new WelcomeEmail($userRole));
            return response()->json(['message' => 'Correo enviado y enlace registrado correctamente.'], 200);
        } catch (\Throwable $e) {
            Log::error("Error al enviar correo de bienvenida: {$e->getMessage()}");
            return response()->json([
                'message' => 'Ocurrió un error al enviar el correo. Intenta nuevamente.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
