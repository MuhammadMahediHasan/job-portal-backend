<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Skill;
use Validator;
use Toastr;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Skill::query()->get();


        return view('backend.skill.skill', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Skill;
        $request->validate([
            'name' => 'required'
        ]);
        $requested_data = $request->all();

        $data->fill($requested_data)->save();
        Toastr::success('Success', "Created Successful");

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit($id): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $data = Skill::query()->findOrFail($id);

        return view('backend.skill.edit-skill', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Skill::query()->findOrFail($id);
        $request->validate([
            'name' => 'required'
        ]);
        $data->fill($request->all())->save();
        Toastr::success('Success', "Updated Successful");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skill::query()->findOrFail($id)->delete();
        Toastr::success('Success', "Deleted Successful");

        return back();
    }
}
