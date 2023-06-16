<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\AdminRegisterRequest;
use App\Models\Admin;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Toastr;

class AdminAuthController extends Controller
{
    public function loginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('backend.auth.login');
    }


    public function login(AdminLoginRequest $request): \Illuminate\Contracts\Foundation\Application|Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        try {
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                Toastr::success('Success', "Login Successful");
            } else {
                Toastr::error('Error', "Email & password doesn't matches");
                return back();
            }

            return redirect('admin');
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect('/admin/login');
    }
}
