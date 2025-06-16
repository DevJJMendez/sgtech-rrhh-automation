<?php

use App\Http\Controllers\HiringFormController;
use App\Http\Controllers\SendWelcomeEmailController;
use App\Models\CollaboratorRole;
use App\Models\InvitationLink;
use App\Models\PersonalData;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/register/{invitation}', [HiringFormController::class, 'showForm'])->name('hiring.form')->middleware('signed');
Route::post('/register', [HiringFormController::class, 'storePersonalData'])->name('hiring.post');

Route::get('/employees/', [HiringFormController::class, 'showTable'])->name('employees.table');
Route::get('/employees/{id}', [HiringFormController::class, 'getEmployee'])->name('get.employee.data');

Route::post('welcome-email', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('welcome-email');

Route::group(
    ['prefix' => 'views'],
    function () {
        Route::get('/enviar-email', [SendWelcomeEmailController::class, 'index'])->name('send');
    }
);