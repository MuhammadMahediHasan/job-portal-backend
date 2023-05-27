<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

if (!file_exists('successResponse')) {
    function successResponse($data, $message = 'success', $code = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $code ?? Response::HTTP_OK
        ], $code ?? Response::HTTP_OK);
    }
}


if (!file_exists('errorResponse')) {
    function errorResponse($data, $message = 'error', $code = 500): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $code ?? Response::HTTP_INTERNAL_SERVER_ERROR
        ], $code ?? Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

if (!file_exists('companyAuthCheck')) {
    function companyAuthCheck(): bool
    {
        return auth()->guard('company')->check();
    }
}

if (!file_exists('jobSeekerAuthCheck')) {
    function jobSeekerAuthCheck(): bool
    {
        return auth()->guard('job_seeker')->check();
    }
}

if (!file_exists('companyAuthUser')) {
    function companyAuthUser(): Authenticatable
    {
        return auth()->guard('company')->user();
    }
}

if (!file_exists('jobSeekerAuthUser')) {
    function jobSeekerAuthUser(): Authenticatable
    {
        return auth()->guard('job_seeker')->user();
    }
}
