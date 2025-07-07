<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HiringFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendWelcomeEmailController;
use App\Models\InvitationLink;
use App\Models\PersonalData;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('employees', function () {
    $users = PersonalData::paginate(10);
    return view('partials.employees-table', compact('users'));
})->middleware(['auth', 'verified'])->name('employees');

Route::get('modal', function () {
    return view('modal');
})->name('modal');
Route::get('/employees/{id}', [HiringFormController::class, 'getEmployee'])->name('get.employee.data');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('employeess')->group(function () {
    Route::get('/enviar-email', [SendWelcomeEmailController::class, 'index'])->name('send.email.view');
    Route::post('welcome-email', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('send.welcome.email');
})->middleware(['auth', 'verified']);

Route::group(['prefix' => 'hiring-form'], function () {
    Route::get('/register/{invitation}', [HiringFormController::class, 'showForm'])->name('hiring.form.view')->middleware('signed');
    Route::post('/register', [HiringFormController::class, 'storePersonalData'])->name('hiring.post');
});

Route::get('/employees/{id}/download-all', [HiringFormController::class, 'downloadAllDocuments'])->name('employees.download.all');

Route::get('invitations', function () {
    $invitations = InvitationLink::with('collaboratorRole')->paginate(10);
    return view('invitations', compact('invitations'));
})->name('invitations');


require __DIR__ . '/auth.php';

