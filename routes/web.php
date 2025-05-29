<?php

use App\Http\Controllers\HiringFormController;
use App\Http\Controllers\SendWelcomeEmailController;
use App\Models\CollaboratorRole;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/register/{invitation}', [HiringFormController::class, 'showForm'])->name('register.form')->middleware('signed');

Route::get('invitation-links', function () {
    $invitationLink = InvitationLink::with('collaboratorRole')->get();
    return response()->json([
        $invitationLink
    ]);
});

Route::post('welcome-email', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('welcome-email');

Route::group(
    ['prefix' => 'views'],
    function () {
        Route::get('/enviar-email', [SendWelcomeEmailController::class, 'index'])->name('send');
    }
);

Route::prefix('hiring')->group(function () {
    Route::get('step/personal-data', [HiringFormController::class, 'index'])->name('step.personal');
    Route::post('step/personal-data', [HiringFormController::class, 'storePersonalData'])->name('step.personal.store');

    Route::get('step/family-data', [HiringFormController::class, 'showFamilyData'])->name('step.family');
    Route::post('step/family-data', [HiringFormController::class, 'storeFamilyData'])->name('step.family.store');

    Route::get('step/academic-data', [HiringFormController::class, 'showAcademicData'])->name('step.academic');
    Route::post('step/academic-data', [HiringFormController::class, 'storeAcademicData'])->name('step.academic.store');
});