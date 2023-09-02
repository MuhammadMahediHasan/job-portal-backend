<?php

namespace App\Actions;

use App\Mail\JobMail;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\JobSeekerSkill;
use Illuminate\Support\Facades\Mail;

class JobMailAction
{
    public static function send($job, $skills)
    {
        $mailData = [
            'subject' => 'Mail from eJobs',
            'body' => 'This is for testing email using smtp.'
        ];

        $jobSeeker = JobSeekerSkill::query()
            ->whereIn('skill_id', $skills)
            ->get()->pluck('job_seekers_id');

        $users = JobSeeker::query()->whereIn('id', $jobSeeker)->get();

        Mail::to($users)->send(new JobMail($mailData));
    }
}
