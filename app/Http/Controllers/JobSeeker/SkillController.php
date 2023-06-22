<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Company;
use App\Models\JobSeekerSkill;
use App\Models\Skill;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class SkillController
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $skillsInfo = JobSeekerSkill::query()
            ->where('job_seekers_id', Auth::guard('job_seeker')->id())
            ->with([
                'skill'
            ])->get();
        $skills = Skill::query()->select('id', 'name')->get();

        return view('frontend.profile.job-seeker.skill',
            compact('skills', 'skillsInfo')
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'skill_id' => 'required',
            'description' => 'sometimes',
        ]);

        try {

            $model = JobSeekerSkill::query()->firstOrNew([
                'id' => $request->get('id')
            ]);
            $requestedData = $request->all();
            $requestedData['job_seekers_id'] = Auth::guard('job_seeker')->id();
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
            $model = JobSeekerSkill::query()->findOrFail($id);
            $model->delete();

            Toastr::success('Success', "Deleted Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }
}
