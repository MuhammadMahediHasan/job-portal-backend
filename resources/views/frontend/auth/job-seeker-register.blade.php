@extends('frontend.layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Register </h1>
            <div class="row g-4">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form action="/job-seeker/register" method="POST">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="title" name="title"
                                               value="{{ old('title') }}"
                                               placeholder="Title"/>
                                        <label for="title">Title</label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="profile" name="profile"
                                               value="{{ old('profile') }}"
                                               placeholder="Profile"/>
                                        <label for="profile">Profile</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               value="{{ old('first_name') }}"
                                               placeholder="First Name"/>
                                        <label for="first_name">First Name</label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               value="{{ old('last_name') }}"
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
                                               value="{{ old('birth_date') }}"
                                               placeholder="Birth Date"/>
                                        <label for="birth_date">Birth Date</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               value="{{ old('phone') }}"
                                               placeholder="Phone"/>
                                        <label for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="portfolio" name="portfolio"
                                               value="{{ old('portfolio') }}"
                                               placeholder="Portfolio"/>
                                        <label for="portfolio">Portfolio</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="resume" name="resume"
                                               value="{{ old('resume') }}"
                                               placeholder="Resume"/>
                                        <label for="resume">Resume</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="address" name="address"
                                               value="{{ old('address') }}"
                                               placeholder="Address"/>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{ old('email') }}"
                                               placeholder="Email Address"/>
                                        <label for="email">Email Address</label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password"
                                               value="{{ old('password') }}"
                                               placeholder="Password"/>
                                        <label for="password">Password</label>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password_confirmation"
                                               name="password_confirmation" value="{{ old('password_confirmation') }}"
                                               placeholder="Retype Password"/>
                                        <label for="password_confirmation">Retype Password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
