<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;

Auth::routes(['verify' => true, 'reset' => true]);

Route::get('features', [HomeController::class, 'features'])->name('features');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::post('check-password', [NoteController::class, 'checkPassword']);

Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'viewProfile'])->name('index');
    Route::get('password', [ProfileController::class, 'editPassword'])->name('password');
    Route::post('password', [ProfileController::class, 'updatePassword']);
    Route::get('name', [ProfileController::class, 'editName'])->name('name');
    Route::post('name', [ProfileController::class, 'updateName']);
    Route::get('email', [ProfileController::class, 'editEmail'])->name('email');
    Route::post('email', [ProfileController::class, 'updateEmail']);
});

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::name('notes.')->group(function () {
    Route::get('/', [NoteController::class, 'create'])->name('add');
    Route::post('/', [NoteController::class, 'store']);
    
    Route::get('notes/{note:slug}', [NoteController::class, 'show'])->name('show');

    Route::middleware(['auth'])->group(function () {
        Route::get('edit/{note:slug}', [NoteController::class, 'edit'])->name('edit');
        Route::post('edit/{note:slug}', [NoteController::class, 'update']);
    	Route::get('all', [NoteController::class, 'index'])->name('index');
        Route::get('trash', [NoteController::class, 'trash'])->name('trash');    	
        Route::delete('delete/{note:slug}', [NoteController::class, 'destroy'])->name('destroy');
        Route::get('restore/{note:slug}', [NoteController::class, 'restore'])->name('restore');
        Route::delete('permanently-delete/{note:slug}', [NoteController::class, 'forceDelete'])->name('forceDelete');
        Route::delete('empty-trash', [NoteController::class, 'emptyTrash'])->name('emptyTrash');
    });
});

Route::name('links.')->group(function () {
    Route::get('links/new', [LinkController::class, 'create'])->name('add');
    Route::post('links/new', [LinkController::class, 'store']);
    Route::get('{link:slug}', [LinkController::class, 'show'])->name('show');
});