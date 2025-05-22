<?php

use App\Http\Controllers\HiringFormController;
use App\Http\Controllers\SendWelcomeEmailController;
use App\Models\CollaboratorRole;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Route;

Route::post('welcome-email', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('welcome-email');

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/register/{invitation}', [HiringFormController::class, 'showForm'])->name('register.form')->middleware('signed');

Route::group(
    ['prefix' => 'views'],
    function () {
        Route::get('/enviar-email', [SendWelcomeEmailController::class, 'index'])->name('send');
    }
);

// Database test
Route::get('invitation-links', function () {
    $invitationLink = InvitationLink::with('collaboratorRole')->get();
    return response()->json([
        $invitationLink
    ]);
});