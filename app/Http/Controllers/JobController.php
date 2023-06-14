<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobCategory;
use App\Models\Skill;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class JobController
{
    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = JobCategory::query()->select('id', 'name')->get();
        $skills = Skill::query()->select('id', 'name')->get();
        $types = Job::TYPES;

        $search = $request->get('search');
        $categoryId = $request->get('category_id');
        $type = $request->get('type');
        $skillId = $request->get('skill_id');
        $jobs = Job::query()
            ->with(['jobCategory', 'skills'])
            ->join('companies', 'companies.id', 'jobs.companies_id')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('location', 'LIKE', "%{$search}%")
                    ->orWhere('salary_range', 'LIKE', "%{$search}%")
                    ->orWhereHas('jobCategory', function ($query) use ($search) {
                        $query->where('title', 'LIKE', "%{$search}%");
                    });
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('job_categories_id', $categoryId);
            })
            ->when($skillId, function ($query) use ($skillId) {
                $query->whereHas('skills', function ($query) use ($skillId) {
                    $query->where('skill_id', $skillId);
                });
            })
            ->when($type, function ($query) use ($type) {
                $query->where('job_nature', $type);
            })
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
            ->orderByDesc('created_at')
            ->paginate();

        return view('frontend.pages.job-list',
            compact('categories', 'types', 'skills', 'jobs')
        );
    }
}
