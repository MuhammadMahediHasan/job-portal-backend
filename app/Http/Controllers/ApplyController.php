<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\JobSeeker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class ApplyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'job_id' => 'required',
            'resume' => 'sometimes'
        ]);

        try {
            $requestedData['jobs_id'] = $request->get('job_id');
            $requestedData['description'] = $request->get('description');
            $requestedData['job_seekers_id'] = jobSeekerAuthUser()->id;

            if ($request->hasFile('resume')) {
                $type = $request->file('resume')->getClientOriginalExtension();
                $path = "resume/";
                $name = time() . uniqid() . "." . $type;
                $request->file('resume')->move($path, $name);
                $requestedData['resume'] = $name;
            }
            $apply = new Apply();
            $apply->fill($requestedData)->save();


            Toastr::success('Success', "Apply Successful");
            return back();
        } catch (\Exception $exception) {
            Toastr::error('Error', 'Something went wrong!');
            return back();
        }
    }
}
