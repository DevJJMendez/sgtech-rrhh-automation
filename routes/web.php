<?php

use App\Http\Controllers\HiringFormController;
use App\Http\Controllers\SendWelcomeEmailController;
use App\Models\CollaboratorRole;
use App\Models\InvitationLink;
use App\Models\PersonalData;
use App\Models\UploadedDocument;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/register/{invitation}', [HiringFormController::class, 'showForm'])->name('hiring.form')->middleware('signed');
Route::post('/register', [HiringFormController::class, 'storePersonalData'])->name('hiring.post');

Route::get('/employees/', [HiringFormController::class, 'showTable'])->name('employees.table');
Route::get('/employees/{id}/documents', [HiringFormController::class, 'showEmployeeDocuments'])->name('employee.documents');
Route::get('/employees/{id}', [HiringFormController::class, 'getEmployee'])->name('get.employee.data');

Route::group(
    ['prefix' => 'views'],
    function () {
        Route::get('/enviar-email', [SendWelcomeEmailController::class, 'index'])->name('send.email');
        Route::post('welcome-email', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('welcome-email');
    }
);
Route::get('/employees/{id}/download-all', [HiringFormController::class, 'downloadAllDocuments'])->name('employees.download.all');
