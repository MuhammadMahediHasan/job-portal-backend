@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        @php
                            $profileImage = 'company-profile-images/' .  companyAuthUser()->id . '.jpg';
                            if (!file_exists($profileImage)) {
                                $profileImage = 'https://bootdey.com/img/Content/avatar/avatar7.png';
                            }
                        @endphp
                        <img src="{{ asset($profileImage) }}"
                             class="rounded-circle avatar-xl img-thumbnail"
                             alt="profile-image"/>
                        <h4 class="mb-0">{{ profileName() }}</h4>
                        <p class="text-muted">{{ companyAuthUser()->title ?? '' }}</p>
                        <div class="mt-3">
                            {{--                            {/*<h4 class="font-13 text-uppercase">About Me :</h4>*/}--}}
                            <p class="text-muted font-13 mb-3">
                                {{ companyAuthUser()->description ?? '' }}
                            </p>
                        </div>
                        <div>
                            <a href="/company/profile/edit"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Company Information
                            </a>
                            <a href="/company/profile/jobs/create"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Post a new job
                            </a>
                            <a href="/company/profile/jobs"
                               class="mb-1 btn btn-block btn-outline-secondary">
                                Your Job List
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
