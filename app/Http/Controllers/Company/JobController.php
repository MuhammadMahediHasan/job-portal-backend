<?php

namespace App\Http\Controllers\Company;

use App\Actions\JobSkillAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Apply;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobSeeker;
use App\Models\Skill;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Toastr;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        try {
            $jobs = Job::query()
                ->with('jobCategory')
                ->orderByDesc('id')
                ->where('companies_id', Auth::id())
                ->get();

            return view('frontend.profile.company.job-list', compact('jobs'));
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $types = Job::TYPES;
        $skills = Skill::query()->select('id', 'name')->get();
        $jobCategories = JobCategory::query()->get();

        return view('frontend.profile.company.job-post',
            compact('jobCategories', 'skills', 'types')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $model = Job::query()->firstOrNew([
                'id' => $request->get('id')
            ]);
            $model->fill($request->fields());
            $model->save();

            JobSkillAction::attach($request->get('skill_id'), $model);

            DB::commit();

            Toastr::success('Success', "Job Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): JsonResponse
    {
        try {
            $job->load('jobCategory');

            return successResponse($job);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application|RedirectResponse
     */
    public function edit($id): Application|View|Factory|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $types = Job::TYPES;
        $skills = Skill::query()->select('id', 'name')->get();
        $jobCategories = JobCategory::query()->get();
        $job = Job::query()->with('skills')->findOrFail($id);
        $oldSkill = $job->skills()->pluck('skill_id')->toArray();

        return view('frontend.profile.company.job-post',
            compact('jobCategories', 'job', 'oldSkill', 'skills', 'types')
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $job->applies()->delete();
            $job->delete();
            DB::commit();

            Toastr::success('Success', "Job Deleted Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function apply($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {
        try {
            $applies = Apply::query()
                ->with(['job', 'jobSeeker.currentCompany'])
                ->where('jobs_id', $id)
                ->get();

            return view('frontend.profile.company.apply-list', compact('applies'));
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }
}
