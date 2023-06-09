@extends('frontend.profile.job-seeker.index')
@section('profile-content')
    <div class="card-box">
        <div class="wow fadeInUp" data-wow-delay="0.5s">

            <form action="/job-seeker/register" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $profile->id ?? '' }}"/>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ old('title', $profile->title ?? '') }}"
                                   placeholder="Title"/>
                            <label for="title">Title</label>
                        </div>
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="profile" name="profile"
                                   value="{{ old('profile', $profile->profile ?? '') }}"
                                   placeholder="Profile"/>
                            <label for="profile">Profile</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                   value="{{ old('first_name', $profile->first_name ?? '') }}"
                                   placeholder="First Name"/>
                            <label for="first_name">First Name</label>
                        </div>
                        <small class="text-danger">{{ $errors->first('first_name') }}</small>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                   value="{{ old('last_name', $profile->last_name ?? '') }}"
                                   placeholder="Last Name"/>
                            <label for="last_name">Last Name</label>
                        </div>
                        <small class="text-danger">{{ $errors->first('last_name') }}</small>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" class="form-control" id="birth_date" name="birth_date"
                                   value="{{ old('birth_date', $profile->birth_date ?? '') }}"
                                   placeholder="Birth Date"/>
                            <label for="birth_date">Birth Date</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="phone" name="phone"
                                   value="{{ old('phone', $profile->phone ?? '') }}"
                                   placeholder="Phone"/>
                            <label for="phone">Phone</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="portfolio" name="portfolio"
                                   value="{{ old('portfolio', $profile->portfolio ?? '') }}"
                                   placeholder="Portfolio"/>
                            <label for="portfolio">Portfolio</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="file" class="form-control" id="resume" name="resume"
                                   value="{{ old('resume', $profile->resume ?? '') }}"
                                   placeholder="Resume"/>
                            <label for="resume">Resume</label>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{ old('address', $profile->address ?? '') }}"
                                   placeholder="Address"/>
                            <label for="address">Address</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email', $profile->email ?? '') }}"
                                   placeholder="Email Address"/>
                            <label for="email">Email Address</label>
                        </div>
                        <small class="text-danger">{{ $errors->first('email') }}</small>
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
