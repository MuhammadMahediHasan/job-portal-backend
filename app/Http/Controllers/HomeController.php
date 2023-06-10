<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = JobCategory::query()
            ->with('job')
            ->get();

        $jobs = Job::query()
            ->join('companies', 'companies.id', 'jobs.companies_id')
            ->select(
                'jobs.title as title',
                'jobs.location',
                'jobs.slug',
                'type',
                'salary_range',
                'dead_line',
                'companies.id as company_id'
            )
            ->limit(20)
            ->orderByDesc('jobs.created_at')
            ->get();

        return view('frontend.pages.home', compact('categories', 'jobs'));
    }

    public function jobDetails($slug): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $job = Job::query()
            ->with('jobSeekerApply')
            ->join('companies', 'companies.id', 'jobs.companies_id')
            ->select(
                'jobs.title as title',
                'jobs.id',
                'jobs.location',
                'jobs.created_at',
                'jobs.slug',
                'type',
                'jobs.description',
                'salary_range',
                'dead_line',
                'companies.id as company_id',
                'companies.description as company_description'
            )
            ->where('slug', $slug)
            ->first();

        abort_if(!$job, 404);

        return view('frontend.pages.job-details', compact('job'));
    }
}