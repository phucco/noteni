<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Hash;
use App\Rules\IsCurrentPassword;
use App\Rules\Recaptcha;
use App\Models\User;

class ProfileService
{
    public function updatePassword($request)
    {
    	$request->validate([
            'current_password' => ['required', new IsCurrentPassword],
            'password' => ['required', 'confirmed', 'min:8', 'different:current_password'],
            'g-recaptcha-response' => ['required', new Recaptcha]
        ]);

        try {
            auth()->user()->update(['password' => Hash::make($request->password)]);            
        } catch (\Exception $error) {
            return false;
        }

        return true;
    }

    public function updateName($request)
    {
        $request->validate([
            'name' => 'required',
            'g-recaptcha-response' => ['required', new Recaptcha]
        ]);

        try {
            auth()->user()->update(['name' => $request->input('name')]);
        } catch (\Exception $error) {
            return false;
        }

        return true;
    }

    public function updateEmail($request)
    {
        $request->validate([
            'email' => ['required', 'email'],            
            'password' => ['required', new IsCurrentPassword],
            'g-recaptcha-response' => ['required', new Recaptcha]
        ]);

        $email = $request->input('email');
        $second_user = User::where('email', $email)->first();

        if ($second_user) {
            $request->session()->flash('error', 'Please try again later.');
            return false;
        } else {
            try {
                $user = auth()->user();
                $user->email = $email;
                $user->email_verified_at = null;
                $user->save();
                
                $user->sendEmailVerificationNotification();
            } catch (\Exception $error) {
                return false;
            }
        }        

        return true;
    }
}