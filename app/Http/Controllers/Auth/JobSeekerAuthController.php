<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\JobSeekerLoginRequest;
use App\Http\Requests\Auth\JobSeekerRegisterRequest;
use App\Models\JobSeeker;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;
use Toastr;

class JobSeekerAuthController
{
    public function registerForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.auth.job-seeker-register');
    }

    public function loginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.auth.login');
    }

    public function register(JobSeekerRegisterRequest $request)
    {
        try {
            $model = JobSeeker::query()->firstOrNew([
                'id' => $request->get('id')
            ]);
            $model->fill($request->fields());
            $model->save();

            if ($request->hasFile('profile_image')) {
                $path = "job-seeker-profile-images/";
                $name = $model->id . ".jpg";
                $request->file('profile_image')->move($path, $name);

            }

            Toastr::success('Success', "Stored Successful");
            if (url()->previous() == 'http://127.0.0.1:8001/job-seeker/profile') {
                return redirect('/job-seeker/profile');
            }
            if (url()->previous() == 'http://127.0.0.1:8001/job-seeker/register') {
                return redirect('/job-seeker/login');
            }
            return redirect('/');
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
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

            return redirect('job-seeker/profile');
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('job_seeker')->logout();

        return redirect('/');
    }
}
