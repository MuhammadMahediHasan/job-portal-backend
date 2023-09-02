<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Message;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Toastr;

class HomeController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = JobCategory::query()
            ->with('job')
            ->get();

        $jobs = Job::query()
            ->join('companies', 'companies.id', 'job_posts.companies_id')
            ->select(
                'job_posts.title as title',
                'job_posts.location',
                'job_posts.slug',
                'type',
                'salary_range',
                'dead_line',
                'companies.id as company_id'
            )
            ->limit(20)
            ->where('job_posts.status', 1)
            ->orderByDesc('job_posts.created_at')
            ->get();

        return view('frontend.pages.home', compact('categories', 'jobs'));
    }

    public function category()
    {
        $categories = JobCategory::query()
            ->with('job')
            ->get();

        return view('frontend.pages.job-category', compact('categories'));
    }

    public function jobDetails($slug): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $job = Job::query()
            ->with('jobSeekerApply')
            ->join('companies', 'companies.id', 'job_posts.companies_id')
            ->select(
                'job_posts.title as title',
                'job_posts.id',
                'job_posts.location',
                'job_posts.created_at',
                'job_posts.slug',
                'job_posts.job_nature',
                'type',
                'job_posts.description',
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

    public function contactUs(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->fill($request->all())->save();

        Toastr::success('Success', "Message Send");
        return back();
    }
}
