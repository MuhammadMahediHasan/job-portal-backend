<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobSeeker;
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
    public function index()
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
        $jobCategories = JobCategory::query()->get();
        return view('frontend.profile.company.job-post', compact('jobCategories'));
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
        $jobCategories = JobCategory::query()->get();
        $job = Job::query()->findOrFail($id);

        return view('frontend.profile.company.job-post', compact('jobCategories', 'job'));
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
}
