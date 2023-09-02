@extends('frontend.profile.company.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">

            <form action="/company/profile/jobs" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $job->id ?? '' }}"/>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <select class="form-control"
                                    id="job_categories_id"
                                    name="job_categories_id"
                                    placeholder="Company Type">
                                <option value="">Select</option>
                                @foreach($jobCategories as $category)
                                    <option
                                        @selected(isset($job->job_categories_id) && $job->job_categories_id == $category->id)
                                        value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="job_categories_id">Category</label>
                            <small class="text-danger">{{ $errors->first('job_categories_id') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="title"
                                   value="{{ old('title', $job->title ?? '') }}"
                                   class="form-control"
                                   id="title"
                                   placeholder="Title"/>
                            <label for="title">Title</label>
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">

                        <label for="description">Description</label>
                        <div class="form-floating">
                            <textarea name="description"
                                      class="form-control ckeditor"
                                      id="description"
                                      placeholder="Description">
                                {{ old('description', $job->description ?? '') }}
                            </textarea>
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="location"
                                   value="{{ old('location', $job->location ?? '') }}"
                                   type="text"
                                   class="form-control"
                                   id="location"
                                   placeholder="Location"/>
                            <label for="location">Location</label>
                            <small class="text-danger">{{ $errors->first('location') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="salary_range"
                                   value="{{ old('salary_range', $job->salary_range ?? '') }}"
                                   type="text"
                                   class="form-control"
                                   id="salary_range"
                                   placeholder="Salary Range"/>
                            <label for="salary_range">Salary Range</label>
                            <small class="text-danger">{{ $errors->first('salary_range') }}</small>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <select class="form-control"
                                    id="job_nature"
                                    name="job_nature"
                                    placeholder="Job Nature">
                                <option value="">Select</option>
                                @foreach($types as $key => $type)
                                    <option
                                        @selected(isset($job->job_nature) && $job->job_nature == $key)
                                        value="{{ $key }}">{{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="job_nature">Job Nature</label>
                            <small class="text-danger">{{ $errors->first('job_nature') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="vacancy"
                                   value="{{ old('vacancy', $job->vacancy ?? '') }}"
                                   type="number"
                                   class="form-control"
                                   id="vacancy"
                                   placeholder="Vacancy"/>
                            <label for="vacancy">Vacancy</label>
                            <small class="text-danger">{{ $errors->first('vacancy') }}</small>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input name="dead_line"
                                   value="{{ old('dead_line', $job->dead_line ?? '') }}"
                                   type="date"
                                   class="form-control"
                                   id="dead_line"
                                   placeholder="Dead Line"/>
                            <label for="dead_line">Dead Line</label>
                            <small class="text-danger">{{ $errors->first('dead_line') }}</small>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <label for="skill_id">Skills</label>
                        <select class="form-control select2-input"
                                id="skill_id"
                                name="skill_id[]"
                                placeholder="Skill" multiple>
                            <option value="">Select</option>
                            @foreach($skills as $skill)
                                <option
                                    @if(old('skill_id') && in_array($skill->id, old('skill_id')))
                                        selected
                                    @elseif(isset($oldSkill) && in_array($skill->id, $oldSkill))
                                        selected
                                    @endif
                                    value="{{ $skill->id }}">{{ $skill->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('skill_id') }}</small>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
