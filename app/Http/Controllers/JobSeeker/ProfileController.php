<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\JobSeekerExperience;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Toastr;

class ProfileController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = jobSeekerAuthUser();

        return view('frontend.profile.job-seeker.personal-info', compact('profile'));
    }

    public function changePassword(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.profile.job-seeker.change-password');
    }

    public function postChangePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::guard('job_seeker')->user();
        $isMatch = Hash::check($request->get('current_password'), $user->getAuthPassword());

        if (!$isMatch) {
            Toastr::error('Error', "Current password doesn't match");
            return back();
        }

        JobSeeker::query()->where('email', $user->email)->update([
            'password' => Hash::make($request->get('password'))
        ]);

        Toastr::success('Success', "Password changed.");

        return back();
    }
}
