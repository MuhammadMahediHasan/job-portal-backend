<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\JobSeeker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $jobs = Job::query()
                ->orderByDesc('id')
                ->where('companies_id', Auth::id())
                ->paginate();

            return successResponse($jobs);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $model = new JobSeeker();
            $model->fill($request->fields());
            $model->save();
            DB::commit();

            return successResponse($model->toArray());
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
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
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): JsonResponse
    {
        try {
            DB::beginTransaction();
            $job->applies()->delete();
            $job->delete();
            DB::commit();

            return successResponse($job);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }
}
