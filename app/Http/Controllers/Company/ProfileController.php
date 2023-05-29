<?php

namespace App\Http\Controllers\Company;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ProfileController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.profile.company.index');
    }

    public function edit(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $profile = companyAuthUser();

        return view('frontend.profile.company.information', compact('profile'));
    }
}
