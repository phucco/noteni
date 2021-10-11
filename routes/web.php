<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes(['verify' => true, 'reset' => true]);

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('status', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::view('/{any}', 'dashboard')->where('any', '.*');