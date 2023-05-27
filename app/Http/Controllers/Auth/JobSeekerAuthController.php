<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\JobSeekerLoginRequest;
use App\Http\Requests\Auth\JobSeekerRegisterRequest;
use App\Models\JobSeeker;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Toastr;

class JobSeekerAuthController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.auth.login');
    }

    public function register(JobSeekerRegisterRequest $request): JsonResponse
    {
        try {
            $model = new JobSeeker();
            $model->fill($request->fields());
            $model->save();

            Toastr::success('Success', "Registration Successful");
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
        }
    }

    public function login(JobSeekerLoginRequest $request): \Illuminate\Contracts\Foundation\Application|Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        try {
            if (Auth::guard('job_seeker')->attempt($request->only('email', 'password'))) {
                Toastr::success('Success', "Login Successful");
            } else {
                Toastr::error('Error', "Email & password doesn't matches");
                return back();
            }

            return redirect('job-seeker/login');
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }
}
