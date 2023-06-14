@extends('frontend.layouts.app')
@section('styles')
    <link href="{{ asset('css/upload-resume.css') }}" rel="stylesheet">
@endsection
@section('styles')
    <style>
        .drop_box {
            margin: 10px 0;
            padding: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            border: 3px dotted #a3a3a3;
            border-radius: 5px;
        }

        .drop_box h4 {
            font-size: 16px;
            font-weight: 400;
            color: #2e2e2e;
        }

        .drop_box p {
            margin-top: 10px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #a3a3a3;
        }

        .upload-btn {
            text-decoration: none;
            background-color: #005af0;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            outline: none;
            transition: 0.3s;
        }

        .upload-btn:hover {
            text-decoration: none;
            background-color: #ffffff;
            color: #005af0;
            padding: 10px 20px;
            border: none;
            outline: 1px solid #010101;
        }

        .form input {
            margin: 10px 0;
            width: 100%;
            background-color: #e2e2e2;
            border: none;
            outline: none;
            padding: 12px 20px;
            border-radius: 4px;
        }

    </style>
@endsection
@section('content')
    <div class="container-xxl text-left py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded"
                             src="{{ asset('company-profile-images/' . $job->company_id . '.jpg') }}" alt=""
                             style="width: 80px; height: 80px;"/>

                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{ $job->title }}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}</span>
                            <span class="text-truncate me-3">
                                <i class="far fa-clock text-primary me-2"></i>
                                {{ \App\Models\Job::TYPES[$job->job_nature] ?? ''  }}
                            </span>
                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary_range }}</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h4 class="mb-3">Job description</h4>
                        <p>
                            {!! $job->description  !!}
                        </p>
                    </div>

                    <div class="">
                        <h4 class="mb-4">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    @if(jobSeekerAuthCheck() && $job->jobSeekerApply)
                                        <a href="#" class="btn btn-primary w-100">
                                            You are already applied for the position.
                                        </a>
                                    @elseif(jobSeekerAuthUser())
                                        <button class="btn btn-primary w-100"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                type="button">
                                            Apply Now
                                        </button>
                                    @else
                                        <a href="/job-seeker/login" class="btn btn-primary w-100">Login for apply</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Published
                            On: {{ dateFormat($job->created_at) }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $job->vacancy }} Position</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{ $job->job_nature }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $job->salary_range }}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $job->location }}</p>
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date
                            Line: {{ dateFormat($job->dead_line) }}</p>
                    </div>
                    <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">Company Detail</h4>
                        <p class="m-0">
                            {{ $job->company_description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <form action="/job-seeker/apply" method="POST" id="professional-info" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_id" id="job_id" value="{{ $job->id }}"/>
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Applying for {{ $job->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="form-group text-left">
                                            <label for="description">Write a cover letter</label>
                                            <textarea rows="2" class="form-control ckeditor" id="description"
                                                      name="description"> </textarea>
                                            <small class="text-danger">{{ $errors->first('description') }}</small>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        @if(jobSeekerAuthCheck() && file_exists('resume/' . jobSeekerAuthUser()->id . '.pdf' ))
                                            <div class="alert alert-success mt-2" role="alert">
                                                <strong>Resume : {{ jobSeekerAuthUser()->resume }}</strong>
                                            </div>
                                        @endif

                                        <div class="drop_box">
                                            <header>
                                                <h4>Also upload new resume here</h4>
                                            </header>
                                            <p>Files Supported: PDF</p>
                                            <input type="file" name="resume" hidden accept=".doc,.docx,.pdf" id="file"
                                                   style="display:none;">
                                            <span class="file-name"></span>
                                            <button type="button" class="upload-btn">Choose File</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary">Confirm Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/upload-resume.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
