<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use App\Models\JobSeeker;
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
        return view('frontend.profile.company.index');
    }

    public function edit(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = companyAuthUser();
        $jobTypes = Company::TYPES;

        return view('frontend.profile.company.information', compact('profile', 'jobTypes'));
    }

    public function changePassword(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.profile.company.change-password');
    }

    public function postChangePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::guard('company')->user();
        $isMatch = Hash::check($request->get('current_password'), $user->getAuthPassword());

        if (!$isMatch) {
            Toastr::error('Error', "Current password doesn't match");
            return back();
        }

        Company::query()->where('email', $user->email)->update([
            'password' => Hash::make($request->get('password'))
        ]);

        Toastr::success('Success', "Password changed.");

        return back();
    }
}
