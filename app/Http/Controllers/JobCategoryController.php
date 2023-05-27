<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobCategoryRequest;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobSeeker;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $jobCategories = JobCategory::query()
                ->orderByDesc('id')
                ->select('name', 'slug')
                ->orderBy('name')
                ->get();

            return successResponse($jobCategories);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobCategoryRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $model = new JobCategory();
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
    public function show(JobCategory $jobCategory): JsonResponse
    {
        try {
            return successResponse($jobCategory);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory): JsonResponse
    {
        try {
            DB::beginTransaction();
            $jobCategory->delete();
            DB::commit();

            return successResponse($jobCategory);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }
}
