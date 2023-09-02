<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\JobSeekerSkill;
use App\Models\Skill;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;
use Illuminate\Support\Facades\File;

class UploadResumeController
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.profile.job-seeker.upload-cv');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'resume' => 'required|mimes:pdf',
        ]);

        try {

            if ($request->hasFile('resume')) {
                $type = $request->file('resume')->getClientOriginalExtension();
                $originalName = $request->file('resume')->getClientOriginalName();
                $path = "resume/";
                $name = Auth::guard('job_seeker')->id() . "." . $type;
                $request->file('resume')->move($path, $name);

                $jobSeeker = JobSeeker::query()->find(Auth::guard('job_seeker')->id());
                $jobSeeker->update([
                    'resume' => $originalName
                ]);
            }


            Toastr::success('Success', "Saved Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function generateResume(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $jobSeeker = JobSeeker::query()->with(['experiences', 'educations', 'skills.skill'])
            ->where('id', Auth::guard('job_seeker')->id())
            ->first();

        return view('frontend.resume-builder.index', compact('jobSeeker'));
    }
}
