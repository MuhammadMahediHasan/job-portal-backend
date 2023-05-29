@extends('frontend.profile.company.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <form action="/company/register" method="POST">
                @csrf

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <select class="form-control"
                                    id="job_categories_id"
                                    name="job_categories_id"
                                    placeholder="Company Type">
                                <option>Select</option>
                            </select>
                            <label for="job_categories_id">Category</label>
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
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-floating">
                            <input name="description"
                                   value="{{ old('description', $job->description ?? '') }}"
                                   class="form-control"
                                   id="description"
                                   placeholder="Description"/>
                            <label for="description">Description</label>
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
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="job_nature"
                                   value="{{ old('job_nature', $job->job_nature ?? '') }}"
                                   type="text"
                                   class="form-control"
                                   id="job_nature"
                                   placeholder="Job Nature"/>
                            <label for="job_nature">Job Nature</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input name="vacancy"
                                   value="{{ old('vacancy', $job->vacancy ?? '') }}"
                                   type="text"
                                   class="form-control"
                                   id="vacancy"
                                   placeholder="Vacancy"/>
                            <label for="vacancy">Vacancy</label>
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
                        </div>
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
