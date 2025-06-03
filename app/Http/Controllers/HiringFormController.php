<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalDataRequest;
use App\Models\InvitationLink;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function storePersonalData(StorePersonalDataRequest $storePersonalDataRequest)
    {
        try {
            DB::beginTransaction();
            $personalData = PersonalData::create([
                'hiring_date' => $storePersonalDataRequest->hiring_date,
                'job_position' => $storePersonalDataRequest->job_position,
                'dni' => $storePersonalDataRequest->dni,
                'date_of_issue' => $storePersonalDataRequest->date_of_issue,
                'place_of_issue' => $storePersonalDataRequest->place_of_issue,
                'first_name' => $storePersonalDataRequest->first_name,
                'middle_name' => $storePersonalDataRequest->middle_name,
                'last_name' => $storePersonalDataRequest->last_name,
                'second_last_name' => $storePersonalDataRequest->second_last_name,
                'blood_group' => $storePersonalDataRequest->blood_group,
                'marital_status' => $storePersonalDataRequest->marital_status,
                'gender' => $storePersonalDataRequest->gender,
                'birthdate' => $storePersonalDataRequest->birthdate,
                'place_of_birth' => $storePersonalDataRequest->place_of_birth,
                'nationality' => $storePersonalDataRequest->nationality,
                'address' => $storePersonalDataRequest->address,
                'phone_number' => $storePersonalDataRequest->phone_number,
                'cellphone_number' => $storePersonalDataRequest->cellphone_number,
                'email' => $storePersonalDataRequest->email,
                'banking_entity' => $storePersonalDataRequest->banking_entity,
                'account_number' => $storePersonalDataRequest->account_number,
                'account_type' => $storePersonalDataRequest->account_type,
                'eps' => $storePersonalDataRequest->eps,
                'pension_fund' => $storePersonalDataRequest->pension_fund,
                'severance_pay_fund' => $storePersonalDataRequest->severance_pay_fund,
                // '' => $storePersonalDataRequest,
                // '' => $storePersonalDataRequest,
                // '' => $storePersonalDataRequest,
            ]);
            DB::commit();
            notify()->success('Datos registrados correctamente');
            return redirect()->back();
        } catch (\Exception $exception) {
            // DB::rollBack();
            dd($exception->getMessage());
            notify()->error('Ocurrio un error');
            return redirect()->back()->withInput();
        }
    }
}
