<?php

namespace App\Http\Controllers;

use App\Models\InvitationLink;
use Illuminate\Http\Request;

class HiringFormController extends Controller
{
    public function showForm($uuid)
    {
        $invitation = InvitationLink::where('uuid', $uuid)->firstOrFail();

        // Validar expiración propia (opcional si usas signedRoute)
        if ($invitation->expires_at->isPast()) {
            abort(410, 'Este enlace ha expirado.');
        }

        return view('forms.register', compact('invitation'));
    }
}
