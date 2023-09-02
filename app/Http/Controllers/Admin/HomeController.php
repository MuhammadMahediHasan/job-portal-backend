<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Message;

class HomeController
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function messages()
    {
        $messages = Message::query()->get();

        return view('backend.message', compact('messages'));
    }

    public function employer()
    {
        $companies = Company::query()->get();

        return view('backend.employer', compact('companies'));
    }

    public function jobs()
    {
        $jobs = Job::query()->get();

        return view('backend.jobs', compact('jobs'));
    }

    public function jobSeekers()
    {
        $jobSeekers = JobSeeker::query()->get();

        return view('backend.job-seeker', compact('jobSeekers'));
    }

    public function jobStatus(Job $job)
    {
        $job->status = $job->status == 1 ? 0 : 1;
        $job->save();

        return back();
    }
}
