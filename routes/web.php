<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HiringFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendWelcomeEmailController;
use App\Http\Controllers\UserController;
use App\Models\InvitationLink;
use App\Models\PersonalData;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/invitation', [SendWelcomeEmailController::class, 'index'])->middleware('auth', 'verified')->name('send.email.view');
Route::post('/send-invitation', [SendWelcomeEmailController::class, 'sendWelcomeEmail'])->name('send.welcome.email');
Route::get('registered-users', [HiringFormController::class, 'getUsers'])->middleware(['auth', 'verified'])->name('registered.users');
Route::get('invitations', [HiringFormController::class, 'getInvitations'])->name('invitations')->middleware('auth', 'verified');

Route::get('modal', function () {
    return view('modal');
})->name('modal');
Route::get('/employee/{id}', [HiringFormController::class, 'getEmployeeInformationForModal'])->name('get.employee.data');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'hiring-form'], function () {
    Route::get('/register/{invitation}', [HiringFormController::class, 'showHiringForm'])->name('hiring.form.view');
    Route::post('/register', [HiringFormController::class, 'storePersonalData'])->name('hiring.post');
    Route::get('thank-you', function () {
        return view('errors.thank_you');
    })->name('hiring.form.thank_you');
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/registered-users', [UserController::class, 'registeredUsers'])->name('all.registered.users');
    Route::delete('/user/{user}', [UserController::class, 'deleteRegisteredUser'])->name('delete.registered.user');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
})->middleware(['auth', 'verified']);

Route::get('/employees/{id}/download-all', [HiringFormController::class, 'downloadAllDocuments'])->name('employees.download.all')->middleware('auth', 'verified');

require __DIR__ . '/auth.php';

