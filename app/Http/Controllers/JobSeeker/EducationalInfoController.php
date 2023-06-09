<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Company;
use App\Models\JobSeekerEducation;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class EducationalInfoController
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $educationalInfos = JobSeekerEducation::query()->get();

        return view('frontend.profile.job-seeker.educational-info',
            compact('educationalInfos')
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'institute' => 'required',
            'degree' => 'required',
            'from_date' => 'required',
            'to_date' => 'sometimes',
        ]);

        try {

            $model = JobSeekerEducation::query()->firstOrNew([
                'id' => $request->get('id')
            ]);
            $requestedData = $request->all();
            $requestedData['job_seekers_id'] = Auth::id();
            $model->fill($requestedData)->save();

            Toastr::success('Success', "Saved Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function delete($id): RedirectResponse
    {
        try {
            $model = JobSeekerEducation::query()->findOrFail($id);
            $model->delete();

            Toastr::success('Success', "Deleted Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }
}
