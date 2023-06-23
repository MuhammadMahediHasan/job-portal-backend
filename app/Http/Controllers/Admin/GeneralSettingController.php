<?php

namespace App\Http\Controllers\Admin;

use App\Models\GeneralSetting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Toastr;

class GeneralSettingController
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = GeneralSetting::query()->first();

        return view('backend.settings.general-settings', compact('data'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = GeneralSetting::query()->firstOrNew([
            'id' => 1
        ]);
        $data->fill($request->all())->save();
        Toastr::success('Success', "Created Successful");

        return back();
    }
}
