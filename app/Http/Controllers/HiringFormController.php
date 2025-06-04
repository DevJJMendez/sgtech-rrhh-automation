<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalDataRequest;
use App\Models\EmergencyContact;
use App\Models\FamilyData;
use App\Models\HealthData;
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
    public function index()
    {
        return view('layouts.register', );
    }
    public function storePersonalData(StorePersonalDataRequest $request)
    {
        try {
            DB::beginTransaction();
            $personalData = PersonalData::create([
                'hiring_date' => $request->hiring_date,
                'job_position' => $request->job_position,
                'dni' => $request->dni,
                'date_of_issue' => $request->date_of_issue,
                'place_of_issue' => $request->place_of_issue,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'second_last_name' => $request->second_last_name,
                'blood_group' => $request->blood_group,
                'marital_status' => $request->marital_status,
                'gender' => $request->gender,
                'birthdate' => $request->birthdate,
                'place_of_birth' => $request->place_of_birth,
                'nationality' => $request->nationality,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'cellphone_number' => $request->cellphone_number,
                'email' => $request->email,
                'banking_entity' => $request->banking_entity,
                'account_number' => $request->account_number,
                'account_type' => $request->account_type,
                'eps' => $request->eps,
                'pension_fund' => $request->pension_fund,
                'severance_pay_fund' => $request->severance_pay_fund,
            ]);
            $familyData = FamilyData::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'relationship' => $request->relationship,
                'dni' => $request->family_data_dni,
                'full_name' => $request->full_name,
                'age' => $request->age,
                'gender' => $request->full_name,
                'birthdate' => $request->family_data_birthdate,
            ]);
            $healthData = HealthData::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'allergies' => $request->allergies,
                'diseases' => $request->diseases,
                'medications' => $request->medications,
                'additional_information' => $request->additional_information,

            ]);
            $emergencyContact = EmergencyContact::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'full_name' => $request->emergency_contact_full_name,
                'phone_number' => $request->emergency_contact_phone_number,
                'relationship' => $request->emergency_contact_relationship,
            ]);
            DB::commit();
            // dd($request->all());
            notify()->success('Datos registrados correctamente');
            return redirect()->back();
        } catch (\Exception $exception) {
            // DB::rollBack();
            dd($exception->getMessage());
            notify()->error('Ha ocurrido un error');
            return redirect()->back()->withInput();
        }
    }
}
