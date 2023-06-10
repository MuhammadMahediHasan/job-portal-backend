@extends('frontend.profile.job-seeker.index')
@section('styles')
    <link href="{{ asset('css/upload-resume.css') }}" rel="stylesheet">
@endsection
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="/job-seeker/profile/upload-resume"
                              method="POST"
                              id="upload-resume"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="drop_box">
                                <header>
                                    <h4>Select File here</h4>
                                </header>
                                <p>Files Supported: PDF</p>
                                <input type="file" name="resume" hidden accept=".doc,.docx,.pdf" id="file"
                                       style="display:none;">
                                <span class="file-name"></span>
                                <button type="button" class="upload-btn">Choose File</button>
                            </div>
                            <small class="text-danger"> {{ $errors->first('resume') }}</small>
                            <button class="btn btn-success float-end">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/upload-resume.js') }}"></script>
@endsection
