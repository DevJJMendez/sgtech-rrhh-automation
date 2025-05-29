<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalDataRequest;
use App\Models\InvitationLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HiringFormController extends Controller
{
    public function showForm($uuid)
    {
        $invitation = InvitationLink::where('uuid', $uuid)->firstOrFail();
        if ($invitation->expires_at->isPast()) {
            abort(410, 'Este enlace ha expirado.');
        }

        return view('layouts.register', );
    }
    public function index(Request $request)
    {
        return view('layouts.register', );
    }

    public function storePersonalData(Request $request)
    {
        $validatedData = $request->validate([
            'hiring_date' => ['required', 'date'],
            'job_position' => ['required', 'string'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'second_last_name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'marital_status' => ['required', 'string'],
            'birthdate' => ['required', 'date'],
            'place_of_birth' => ['required', 'string'],
            'blood_group' => ['required', 'string'],
            'dni' => ['required', 'numeric'],
            'date_of_issue' => ['required', 'string'],
            'place_of_issue' => ['required', 'string'],
            'nationality' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'cell_phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'banking_entity' => ['required', 'string'],
            'account_number' => ['required', 'string'],
            'account_type' => ['required', 'string'],
            'eps' => ['required', 'string'],
            'pension_fund' => ['required', 'string'],
            'severance_pay_found' => ['required', 'string'],
        ]);
        if (empty($request->session()->get('personal_data'))) {
            $personalData = $validatedData;
            $request->session()->put('personal_data', $personalData);
        } else {
            $personalData = $request->session()->get('personal_data');
            $personalData = array_merge([$personalData, $validatedData]);
            $request->session()->put('personal_data', $personalData);
        }
        return redirect()->route('step.academic');
    }
}
