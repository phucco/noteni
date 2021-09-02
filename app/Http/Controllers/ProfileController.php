<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;

	public function __construct(ProfileService $profileService)
	{
		$this->profileService = $profileService;
	}

    public function viewProfile()
    {
        $user = auth()->user();
        
        return view('profile.index', ['user' => $user]);
    }

    public function editPassword(Request $request)
    {
        return view('profile.password', ['user' => auth()->user()]);
    }

    public function updatePassword(Request $request)
    {
    	$result = $this->profileService->updatePassword($request);    	

        if ($result) return redirect()->route('profile.index')->with('status', 'Your password has been changed.');

        return back()->with('error', 'Please try again later.');
    }
    
    public function editName()
    {
        return view('profile.name');
    }

    public function updateName(Request $request)
    {
        $result = $this->profileService->updateName($request);      

        if ($result) return redirect()->route('profile.index')->with('status', 'Your name has been changed.'); 

        return back()->with('error', 'Please try again later.');
    }

    public function editEmail()
    {
        return view('profile.email');
    }

    public function updateEmail(Request $request)
    {
        $result = $this->profileService->updateEmail($request);      

        if ($result) return redirect()->route('profile.index')->with('status', 'Your email has been changed. Please check your email for a verification link.');

        return back()->with('error', 'Please try again later.');
    }
}
