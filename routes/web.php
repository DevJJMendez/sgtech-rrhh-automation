<?php

use App\Http\Controllers\SendWelcomeEmailController;
use App\Models\CollaboratorRole;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Route;

Route::post('welcome-email', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('welcome-email');

Route::get('/', function () {
    $collaboratorRoles = CollaboratorRole::select(['collaborator_role_id', 'name'])->get();
    return view('layouts.app', compact('collaboratorRoles'));
});

// Database test
Route::get('invitation-links', function () {
    $invitationLink = InvitationLink::with('collaboratorRole')->get();
    return response()->json([
        $invitationLink
    ]);
});