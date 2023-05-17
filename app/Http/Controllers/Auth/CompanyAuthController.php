<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\CompanyLoginRequest;
use App\Http\Requests\Auth\CompanyRegisterRequest;
use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CompanyAuthController
{
    public function register(CompanyRegisterRequest $request): JsonResponse
    {
        try {
            $model = new Company();
            $model->fill($request->fields());
            $model->save();

            return successResponse($model->toArray());
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }

    public function login(CompanyLoginRequest $request): JsonResponse
    {
        try {

            $response = array();
            $message = 'unauthenticated';
            $code = Response::HTTP_UNAUTHORIZED;
            $company = Company::query()->where('email', $request->get('email'))->first();
            if (!$company) {
                $response[]['email'] = "Email doesn't exists";
            } else if (!Hash::check($request->get('password'), $company->password)) {
                $response[]['password'] = "Email & password doesn't matches";
            } else {

                $message = 'success';
                $code = Response::HTTP_OK;
                $response = array_merge(
                    $company->only('name', 'email'), [
                        'token' => $company->createToken(uniqid())->plainTextToken
                    ]
                );
            }

            return successResponse($response, $message, $code);
        } catch (\Exception $exception) {
            return errorResponse([], $exception->getMessage());
        }
    }
}
