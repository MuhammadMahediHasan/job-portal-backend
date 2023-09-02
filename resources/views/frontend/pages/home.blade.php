@extends('frontend.layouts.app')
@section('content')
    <div class="home-banner">
        <div class="banner-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Looking for a job?</h1>
                        <h2>Find Your <span>Job</span> here</h2>
                        <form class="banner-form" action="/jobs">
                            <div class="row sm-gutters">
                                <div class="col-sm-7" style="transition: 0.5s">
                                    <div class="form-group">
                                        <input type="text" name="search"
                                               placeholder="Keywords, Profession or Name"
                                               class="form-control" autoComplete="off"/>
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <p class="advance-button">Advance Search</p></div>
                                    <p class="are-you">
                                        <a href="/job-seeker/register">Are you Hiring? Post a Job Now.</a>
                                    </p>
                                </div>
                                <div class="banner-box fade-in">
                                    <a class="btn btn-default" href="/job-seeker/register">Drop Your CV</a>
                                    <ul>
                                        <li>
                                            <a href="/job-seeker/register">
                                                <i class="fa fa-sign-in"></i>
                                                Sign Up
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/job-seeker/login">
                                                <i class="fa fa-sign-in"></i>
                                                Sign In
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    {/* Category Start */}--}}
    @include('frontend.components.category')
    {{--    {/* Category End */}--}}


    {{--    {/* About Start */}--}}
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid w-100" src="{{ asset('/img/banner.webp') }}" alt=""/>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                    {!! substr($generalSetting->about_us, 0, 700) !!}...
                    <br/>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="/about-us">Read More</a>
                </div>
            </div>
        </div>
    </div>
    {{--    {/* About End */}--}}


    {{--    {/* Jobs Start */}--}}
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>

            <div class="job-item p-4 mb-4">
                <div class="row g-4">
                    @foreach($jobs as $job)
                        @include('frontend.components.job')
                    @endforeach
                    <div class="col-12">
                        <center>
                            <a href="/jobs" class="btn btn-primary">Show more</a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.pages.testimonial')
@endsection
