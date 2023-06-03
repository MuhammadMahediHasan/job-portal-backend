<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\CompanyLoginRequest;
use App\Http\Requests\Auth\CompanyRegisterRequest;
use App\Models\Company;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Toastr;

class CompanyAuthController
{
    public function registerForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $jobTypes = Company::TYPES;

        return view('frontend.auth.company-register', compact('jobTypes'));
    }

    public function register(CompanyRegisterRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        try {
            $model = Company::query()->firstOrNew([
                'id' => $request->input('id')
            ]);
            $model->fill($request->fields());
            $model->save();

            Toastr::success('Success', "Login Successful");
            return redirect('/');
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function loginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('frontend.auth.login');
    }

    public function login(CompanyLoginRequest $request): RedirectResponse
    {
        try {
            if (Auth::guard('company')->attempt($request->only('email', 'password'))) {
                Toastr::success('Success', "Login Successful");
            } else {
                Toastr::error('Error', "Email & password doesn't matches");
                return back();
            }

            return redirect('company/profile');
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function logout(): RedirectResponse
    {
        Auth::guard('company')->logout();

        return back();
    }
}
