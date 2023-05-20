<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\JobSeekerLoginRequest;
use App\Http\Requests\Auth\JobSeekerRegisterRequest;
use App\Models\JobSeeker;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class JobSeekerAuthController
{
    public function register(JobSeekerRegisterRequest $request): JsonResponse
    {
        try {
            $model = new JobSeeker();
            $model->fill($request->fields());
            $model->save();

            return successResponse($model->toArray());
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }

    public function login(JobSeekerLoginRequest $request): JsonResponse
    {
        try {

            $response = array();
            $message = 'unauthenticated';
            $code = Response::HTTP_UNAUTHORIZED;

            if (Auth::guard('job_seeker')->attempt($request->only('email', 'password'))) {

                $message = 'success';
                $code = Response::HTTP_OK;
                $company = JobSeeker::query()->where('email', $request->get('email'))->first();
                $response = array_merge(
                    $company->only('name', 'email'), [
                        'token' => $company->createToken('job_seeker')->accessToken
                    ]
                );
            } else {
                $response[]['password'] = "Email & password doesn't matches";
            }

            return successResponse($response, $message, $code);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }
}
