<?php

namespace App\Http\Controllers;

use App\Models\InvitationLink;
use Illuminate\Http\Request;

class HiringFormController extends Controller
{
    public function showForm($uuid)
    {
        $invitation = InvitationLink::where('uuid', $uuid)->firstOrFail();
        if ($invitation->expires_at->isPast()) {
            abort(410, 'Este enlace ha expirado.');
        }

        return view('forms.register', compact('invitation'));
    }
    public function index()
    {
        return view('forms.personal-data');
    }

    public function storePersonalData()
    {
        return redirect()->route('step.family');
    }
    public function showFamilyData()
    {
        return view('forms.family-data');
    }
    public function storeFamilyData()
    {
        return redirect()->route('step.academic');
    }
    public function showAcademicData()
    {
        return view('forms.academic-information');
    }
    public function storeAcademicData()
    {
        return redirect()->route('step.health');
    }
    public function showHealthData()
    {
        return view('forms.health-data');
    }
}
