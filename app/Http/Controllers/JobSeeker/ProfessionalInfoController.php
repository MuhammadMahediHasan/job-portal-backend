<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Company;
use App\Models\JobSeekerExperience;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class ProfessionalInfoController
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $experiences = JobSeekerExperience::query()
            ->where('job_seekers_id', Auth::guard('job_seeker')->id())
            ->with([
                'company'
            ])
            ->get();

        $companies = Company::query()->select('id', 'name')->get();

        return view('frontend.profile.job-seeker.professional-info',
            compact('companies', 'experiences')
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'companies_id' => 'required',
            'designation' => 'required',
            'from_date' => 'required',
            'to_date' => 'sometimes',
            'is_present' => 'sometimes',
            'description' => 'sometimes',
        ]);

        try {

            $model = JobSeekerExperience::query()->firstOrNew([
                'id' => $request->get('id')
            ]);
            $requestedData = $request->all();
            $requestedData['job_seekers_id'] = Auth::guard('job_seeker')->id();
            $model->fill($requestedData)->save();

            Toastr::success('Success', "Saved Successful");
            return back();
        } catch (\Exception $exception) {
            dd($exception);
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }

    public function delete($id): RedirectResponse
    {
        try {
            $model = JobSeekerExperience::query()->findOrFail($id);
            $model->delete();

            Toastr::success('Success', "Deleted Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }
}
