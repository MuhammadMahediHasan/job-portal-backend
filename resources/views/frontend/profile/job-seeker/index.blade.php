@extends('frontend.layouts.app')
@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        @php
                            $profileImage = 'job-seeker-profile-images/' .  jobSeekerAuthUser()->id . '.jpg';
                            if (!file_exists($profileImage)) {
                                $profileImage = 'https://bootdey.com/img/Content/avatar/avatar7.png';
                            }
                        @endphp
                        <img src="{{ asset($profileImage) }}"
                             class="rounded-circle avatar-xl img-thumbnail" alt="profile-image"/>
                        <br/>
                        <br/>
                        <h4 class="mb-0">{{ profileName() }}</h4>
                        <p class="text-muted">{{ jobSeekerAuthUser()->title ?? '' }}</p>


                        <div class="mt-3">
                            {{--                            {/*<h4 class="font-13 text-uppercase">About Me :</h4>*/}--}}
                            <p class="text-muted font-13 mb-3">

                                {{ jobSeekerAuthUser()->description ?? '' }}
                            </p>

                        </div>

                        <div>
                            <a href="/job-seeker/profile"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Personal Information
                            </a>
                            <a href="/job-seeker/profile/professional-info"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Professional Information
                            </a>
                            <a href="/job-seeker/profile/educational-info"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Educational Information
                            </a>
                            <a href="/job-seeker/profile/skill"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Skills
                            </a>
                            <a href="/job-seeker/profile/upload-resume"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Upload Resume
                            </a>
                            <a href="/job-seeker/profile/generate-resume"
                               class="btn btn-block btn-outline-secondary">
                                Resume Generate
                            </a>
                        </div>
                    </div>


                </div>

                <div class="col-lg-8 col-xl-8">
                    @yield('profile-content')
                </div>
            </div>
        </div>
    </div>
@endsection
