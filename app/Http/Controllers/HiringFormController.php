<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalDataRequest;
use App\Models\AcademicInformation;
use App\Models\EmergencyContact;
use App\Models\FamilyData;
use App\Models\HealthData;
use App\Models\InvitationLink;
use App\Models\ItKnowledge;
use App\Models\Language;
use App\Models\PersonalData;
use App\Models\Specialty;
use App\Models\UploadedDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class HiringFormController extends Controller
{
    public function showForm($uuid)
    {
        $invitation = InvitationLink::where('uuid', $uuid)->firstOrFail();
        if (!$invitation) {
            return response()->view('errors.link_not_found', [], 404);
        }
        if ($invitation->status === 'used') {
            return response()->view('errors.link_already_used', [], 403);
        }
        if ($invitation->expires_at->isPast()) {
            return response()->view('errors.link_expired', [], 410);
        }
        return view('layouts.register', compact('invitation'));
    }
    public function storePersonalData(StorePersonalDataRequest $request)
    {
        $invitation = InvitationLink::where('uuid', $request->invitation_uuid)->firstOrFail();
        try {
            DB::beginTransaction();
            $personalData = PersonalData::create([
                'hiring_date' => $request->hiring_date,
                'fk_invitation_link_id' => $invitation->id,
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
            $academicInformation = AcademicInformation::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'academic_institution' => $request->academic_institution,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'university_career' => $request->university_career,
                'degree' => $request->degree,
                'card_number' => $request->card_number,
            ]);
            $specialty = Specialty::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'course' => $request->course,
                'start_date' => $request->specialty_start_date,
                'end_date' => $request->specialty_end_date,
                'academic_institution' => $request->specialty_academic_institution,
                'level' => $request->specialty_level,
            ]);
            $itKnowledge = ItKnowledge::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'technology' => $request->technology,
                'level' => $request->knowledge_level,
            ]);
            $language = Language::create([
                'fk_personal_data_id' => $personalData->personal_data_id,
                'language' => $request->languages,
                'level' => $request->language_level,
            ]);
            if ($request->hasFile('documents')) {
                # code...
                foreach ($request->file('documents') as $documentName => $file) {
                    # code...
                    $path = $file->storeAs(
                        "documents/{$personalData->first_name}{$personalData->last_name}", // Carpeta por usuario
                        "{$personalData->first_name}-{$personalData->last_name}-{$documentName}." . $file->getClientOriginalExtension(), // Renombra
                        'public' // Usa el disco "public"
                    );
                    UploadedDocument::create([
                        'fk_personal_data_id' => $personalData->personal_data_id, // o $candidate->id
                        'label' => 'Documento sin nombre',
                        'original_name' => $file->getClientOriginalName(),
                        'path' => $path,
                    ]);
                }
            }
            $invitation = InvitationLink::where('uuid', $request->invitation_uuid)->firstOrFail();
            $invitation->update([
                'status' => 'used',
                'used_at' => now(),
            ]);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            // DB::rollBack();
            dd($exception->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function showTable()
    {
        $users = PersonalData::all();
        return view('components.employees-table', compact(['users']));
    }
    public function getEmployee($id)
    {
        $user = PersonalData::with([
            'academicInformation' => function ($query) {
                $query->select('academic_information_id', 'fk_personal_data_id', 'academic_institution', 'start_date', 'end_date', 'university_career', 'degree', 'card_number');
            },
            'familyData' => function ($query) {
                $query->select('family_data_id', 'fk_personal_data_id', 'relationship', 'full_name', 'gender', 'age', 'birthdate', 'dni');
            },
            'healthData' => function ($query) {
                $query->select('health_data_id', 'fk_personal_data_id', 'allergies', 'diseases', 'medications', 'additional_information');
            },
            'emergencyContact' => function ($query) {
                $query->select('emergency_contact_id', 'fk_personal_data_id', 'full_name', 'phone_number', 'relationship');
            },
            'languages' => function ($query) {
                $query->select('language_id', 'fk_personal_data_id', 'language', 'level');
            },
            'itKnowledge' => function ($query) {
                $query->select('itknowledge_id', 'fk_personal_data_id', 'technology', 'level');
            },
            'specialties' => function ($query) {
                $query->select('specialty_id', 'fk_personal_data_id', 'course', 'start_date', 'end_date', 'academic_institution', 'level');
            },
        ])->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }

    public function showDocuments(UploadedDocument $document)
    {
        if (!Storage::exists($document->path)) {
            abort(404, 'Archivo no encontrado');
        }
        return Storage::response($document->path, $document->original_name);
    }
    public function show(UploadedDocument $document)
    {
        if (!Storage::disk('public')->exists($document->path)) {
            abort(404, 'Archivo no encontrado');
        }
        // return Storage::disk('public')->download($document->path, $document->original_name);
        return Storage::download("public/{$document->path}", $document->original_name);

    }
    public function showDetail($id)
    {
        $user = PersonalData::with('uploadedDocuments')->findOrFail($id);
        return view('layouts.employee-documents', compact('user'));
    }
    public function downloadAllDocuments($id)
    {
        $user = PersonalData::with('uploadedDocuments')->findOrFail($id);

        if ($user->uploadedDocuments->isEmpty()) {
            return back()->with('error', 'Este usuario no tiene documentos para descargar.');
        }

        $zipFileName = "{$user->first_name}{$user->last_name}.zip";
        $zipPath = storage_path("app/temp/{$zipFileName}");

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($user->uploadedDocuments as $document) {
                $filePath = storage_path("app/public/{$document->path}");
                if (file_exists($filePath)) {
                    $zip->addFile($filePath, basename($filePath));
                }
            }
            $zip->close();

            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        return back()->with('error', 'No se pudo generar el archivo ZIP.');
    }
}