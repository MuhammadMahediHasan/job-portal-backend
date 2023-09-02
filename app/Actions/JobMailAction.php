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
        $url = url("/job-details/{$job->slug}");
        $mailData = [
            'subject' => 'eJobs Job alert.',
            'body' => "Your job alert for {$job->title}. Click here to show job details $url"
        ];

        $jobSeeker = JobSeekerSkill::query()
            ->whereIn('skill_id', $skills)
            ->get()->pluck('job_seekers_id');

        $users = JobSeeker::query()->whereIn('id', $jobSeeker)->get();

        Mail::to($users)->send(new JobMail($mailData));
    }
}
