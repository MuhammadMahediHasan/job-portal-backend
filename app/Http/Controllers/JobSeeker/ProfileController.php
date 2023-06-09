<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Company;
use App\Models\JobSeekerExperience;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class ProfileController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = jobSeekerAuthUser();

        return view('frontend.profile.job-seeker.personal-info', compact('profile'));
    }

}
